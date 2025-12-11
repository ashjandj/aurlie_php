<div class="page">
    @foreach( $transactions as $transaction)
    <div class="paymentHistory_item d-flex align-items-center mt-2 justify-content-between" data-tid="{{$transaction->transaction_id}}">
        <div class="paymentHistory_left d-flex align-items-center">
            <div class="paymentHistory_icon">
                @if($transaction->status == 'paid')
                <img src="{{asset_path('assets/images/frontend/payment-successfull.png')}}" class="img-fluid" alt="failed">
                @else
                <img src="{{asset_path('assets/images/frontend/payment-fail.png')}}" class="img-fluid" alt="failed">
                @endif
            </div>
            <div class="paymentHistory_cnt">
                <div>{{ucfirst($transaction->subscription->plan_name)}}</div>
                <span>{{getConvertedDate($transaction['created_at'], 'd/m/Y')}}<span class="dot mx-1">
            </div>
        </div>
        <div class="paymentHistory_right">
            <p class="paymentHistory_price mb-0 failedPrice">
            {{formatCurrency($transaction['amount'])}}
            </p>
        </div>
    </div>
    @endforeach
</div>