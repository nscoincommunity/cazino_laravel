<?php $__env->startSection('title', 'Payment'); ?>

<?php $__env->startPush('styles'); ?>
  <style>
  .card{
    border-radius: 0;
  }
    body, html{
      font-size: 11pt;
    }
    .coin-items{
      overflow: auto;
      min-height: 500px;
      border-top: solid 1px rgba(0,0,0,.2);
    }
    .show-coin .card:hover{
      background: rgba(0,0,0,.03);
      cursor: pointer;
    }
    .selected{
      border: solid 2px #c60035;
      background: rgba(0,0,0,.03);
    }
    .form-search{
      border: solid 1px rgba(0,0,0,.2);
      padding: 5px;
    }
    .form-search .form-search-input{
      border: none;
    }
    .form-search .form-search-input:focus {
      box-shadow: none;
    }

    .form-search .form-search-icon span{
      background: none;
      border: none;
    }
    table > thead,
    table > tfoot > tr > th{
      background: rgba(0,0,0,.03);
    }
    .bold{
      font-weight: bold;
    }

  </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <div id="coinpayment-vue">
    <div class="row justify-content-md-center mb-5">
      <div class="col-sm-12">
        <div class="row mt-5">
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <div class="text-center">
                  <?php if(config('coinpayment.header_type') == 'logo'): ?>
                    <img src="<?php echo e(asset(config('coinpayment.header_logo'))); ?>" width="170">
                  <?php elseif(config('coinpayment.header_type') == 'text'): ?>
                    <h5 class="card-title"><?php echo e(config('coinpayment.header_text')); ?></h5>
                  <?php endif; ?>
                </div>
              </div>
              <div class="alert alert-danger" style="border-radius:0;" v-if="isError">
                <ul>
                  <li v-for="(error, index) in errors">
                    {{ index }}
                    <ul>
                      <li v-for="err in error">{{ err }}</li>
                    </ul>
                  </li>
                </ul>
              </div>
              <?php if(count($data['items']) > 0): ?>
              <table class="table">
                <thead>
                  <tr>
                    <th>Description</th>
                    <th class="text-right">Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $itemTotal = 0;
                  ?>
                  <?php $__currentLoopData = $data['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td>
                      <?php echo e($item['descriptionItem']); ?>

                      <div>
                        <small class="text-muted">Item Price: <?php echo e($item['priceItem']); ?> <?php echo e(config('coinpayment.default_currency')); ?></small><br>
                        <small class="text-muted">Quantity: <?php echo e($item['qtyItem']); ?></small>
                      </div>
                    </td>
                    <td class="text-right"><?php echo e($item['subtotalItem']); ?> <?php echo e(config('coinpayment.default_currency')); ?></td>
                  </tr>
                  <?php
                  $itemTotal += $item['subtotalItem']
                  ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
              <table class="table">
                <tfoot>
                  <tr>
                    <th>Item Total</th>
                    <th class="text-right"><?php echo e(number_format($itemTotal, 2)); ?> <?php echo e(config('coinpayment.default_currency')); ?></th>
                  </tr>
                  <tr>
                    <td class="text-right">Total Amount <?php echo e(config('coinpayment.default_currency')); ?></td>
                    <td class="text-right"><?php echo e($data['amountTotal']); ?> <?php echo e(config('coinpayment.default_currency')); ?></td>
                  </tr>
                  <tr>
                    <td class="text-right">Payment Method</td>
                    <td class="text-right">{{ paymentMethod }}</td>
                  </tr>
                  <tr>
                    <td class="text-right">Total Amount {{ paymentMethod }}</td>
                    <td class="text-right">{{ total_amount_coin }}</td>
                  </tr>
                </tfoot>
              </table>
              <?php endif; ?>
              <div class="card-body text-center">
                <hr>
                <small class="text-muted"><?php echo e($data['note']); ?></small>
              </div>
            </div>
            <div class="text-center">
              <button type="button" v-bind:disabled="!(coins.length > 0)" class="btn btn-block btn-danger mt-3 mb-4" @click="confirmation" style="background:red;" name="button">Pay Now <i class="fa fa-arrow-circle-right"></i></button>
              <div class="text-muted">
                <a href="<?php echo e(url()->previous()); ?>" class="text-muted">Cancel your payment</a> | <a class="text-muted" href="<?php echo e(route('coinpayment.transaction.histories')); ?>">Transaction Histories</a>
              </div>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="card">
              <div class="card-body">
                <div class="input-group mb-3 form-search">
                  <input v-model="searchCoin" autofocus type="search" placeholder="Search Coin..." value="" class="form-control form-search-input">
                  <div class="input-group-prepend form-search-icon">
                    <span class="input-group-text" id="basic-addon1">
                      <i class="fa fa-search"></i>
                    </span>
                  </div>
                </div>
                <div class="mt-3 mb-3" v-if="coins.length === 0">
                  <i class="fa fa-spinner fa-pulse fa-lg"></i> Loading Payment Method...
                </div>
                <div class="row coin-items">
                  <div class="col-sm-6 show-coin mt-3" v-for="(coin, index) in filterCoin()" :key="coin.name" @click="selectMethod(coin)">
                    <div class="card" v-bind:class="{ 'selected' : coin.selected }">
                      <div class="media mt-2 ml-2 mr-2 mb-3">
                        <img class="mr-3" width="40" v-bind:src="coin.icon">
                        <div class="media-body">
                          <strong class="mt-0">{{ coin.name }}</strong><br>
                          <small class="text-muted">{{ coin.rate }}</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="modal" id="paynow" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Payment Information</h5>
          </div>
          <div class="table-responsive col-sm-">
            <table class="table">
              <tr>
                <td class="text-right">Status:</td>
                <td>{{ payment.last.status_text }}</td>
              </tr>
              <tr>
                <td class="text-right">Total Amount To Send:</td>
                <td>{{ payment.first.amount }} {{ payment.last.coin }} <span>(total confirms needed: {{ payment.first.confirms_needed }})</span></td>
              </tr>
              <tr>
                <td class="text-right">Received So Far:</td>
                <td>{{ payment.last.receivedf }} {{ payment.last.coin }}</td>
              </tr>
              <tr>
                <td class="text-right">Balance Remaining:</td>
                <td>
                  {{ payment.first.amount }} {{ payment.last.coin }}
                </td>
              </tr>
              <tr>
                <td class="text-center" colspan="2">
                  <qrcode v-bind:value="payment.first.address" :options="{ size: 200 }"></qrcode>
                  <div class="text-danger">
                    <small>Do not send value to us if address status is expired!</small>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="text-right">Send To Address:</td>
                <td>{{ payment.first.address }}</td>
              </tr>
              <tr>
                <td class="text-right">Time Left For Us to Confirm Funds:</td>
                <td>
                  <div class="time-remaining bold">.../.../... ...:...:...</div>
                </td>
              </tr>
              <tr>
                <td class="text-right">Payment ID:</td>
                <td>{{ payment.first.txn_id }}</td>
              </tr>
              <tr>
                <td class="text-center text-muted" colspan="2">
                  <a class="text-muted" v-bind:href="payment.first.status_url" target="_blank">Alternative Link</a> | <a class="text-muted" href="<?php echo e(route('coinpayment.transaction.histories')); ?>">Transaction Histories</a>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
  <script src="https://cdn.jsdelivr.net/npm/@xkeshi/vue-qrcode@0.3.0/dist/vue-qrcode.min.js"></script>
  <script type="text/javascript">
  Vue.component('qrcode', VueQrcode);
  var vue = new Vue({
    el: '#coinpayment-vue',
    data: {
      paymentMethod: '-',
      total_amount_coin: 0,
      searchCoin: '',
      amountTotalUsd: <?php echo e($data['amountTotal']); ?>,
      coins: [],
      errors: [],
      isError: false,
      coinAliases:[],
      payment: {
        first: {},
        last: {}
      }
    },
    created(){
      this.getMethods();
      //$('#paynow').modal('show');
    },
    methods:{
      getMethods(){
        var self = this;
        axios.get('<?php echo e(route('coinpayment.ajax.rate.usd', $data['amountTotal'])); ?>')
          .then(function(json){
            self.paymentMethod = json.data.coins[0].iso;
            self.total_amount_coin = json.data.coins[0].rate;
            self.coins = json.data.coins_accept;
            self.coinAliases = json.data.aliases;

            $('.coin-items').slimScroll({
                height: '500px'
            });
          });
      },
      selectMethod(item){

        this.coins.forEach(function(coin){
          coin.selected = false;
        });

        item.selected = true;
        this.paymentMethod = item.iso;
        this.total_amount_coin = item.rate;
        this.searchCoin = '';
      },
      filterCoin: function() {
        var self = this;
        return this.coins.filter(function(coin) {
          let regex = new RegExp('(' + self.searchCoin + ')', 'i');
          return coin.name.match(regex);
        })
      },
      confirmation(){
        var self = this;
        swal('Confirmation', 'Are you sure ?',{
          buttons: true
        }).then(function(event){
          if(event){
            self.makeTransaction();
          }
        });
      },
      makeTransaction(){
        var self = this;
        swal('Please Wait','Creating Transactoin...', {
          closeOnClickOutside: false,
          closeOnEsc: false,
          buttons:false,
          timer: 10000
        });

        var params = {
          amount: this.amountTotalUsd,
          payment_method: this.paymentMethod
        };

        axios.post(`<?php echo e(route('coinpayment.ajax.store.transaction')); ?>`, params)
          .then(function(json){
            self.payment.first = json.data.result;
            var _self = self;

            if(json.data.error == 'ok'){
              var result = json.data.result;
              var parameters = {
                result,
                params: <?php echo $params; ?>,
                payload: <?php echo $payload; ?>

              };
              axios.post(`<?php echo e(route('coinpayment.ajax.trxinfo')); ?>`, parameters)
                .then(function(json){
                  _self.payment.last = json.data.result;
                   var date = new Date(json.data.result.time_expires * 1000);
                   var time_exp = `${date.getFullYear()}/${date.getMonth()+1}/${date.getDate()} ${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}`;
                  $('.time-remaining').countdown(time_exp, function(event){
                    $(this).html(event.strftime('%D days %H:%M:%S'));
                  });
                  swal.close();
                  $('#paynow').modal('show');
                })
                .catch(function(error){
                  swal('Danger!', 'Look like something wrong!');
                });

            }else{
              swal('Error!', json.data.error);
            }
          })
          .catch(function(err){
            if(err !== undefined)
              if(err.response !== undefined)
                if(err.response.status == 422){
                  swal('Danger!', err.response.data.message,{
                    dangerMode: true,
                    icon: "error",
                  });
                  self.errors = err.response.data.errors;
                  self.isError = true;
                }
          });

      }
    }
  });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('coinpayment::layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>