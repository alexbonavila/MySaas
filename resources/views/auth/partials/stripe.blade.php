<div class="register-box-body">
    <div class="alert alert-success" style="display:none" id="stripe_status">
        Ok! Now please register!
    </div>
    <form action="" method="POST" id="payment-form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <span class="payment-errors"></span>
        <p class="login-box-msg"> Bank Account Data</p>
        <div class="form-row form-group has-feedback">
            <label>
                <input class="form-control" placeholder="Card Number" type="text" size="20" data-stripe="number"/>
            </label>
        </div>

        <div class="form-row form-group has-feedback">
            <label>
                <input class="form-control" placeholder="CVC" type="text" size="4" data-stripe="cvc"/>
            </label>
        </div>

        <div class="form-row form-group has-feedback">
            <label>

                <input placeholder="MM" type="text" size="2" data-stripe="exp-month"/>
            </label>
            <span> / </span>
            <input placeholder="YYYY" type="text" size="4" data-stripe="exp-year"/>
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit Payment</button>
    </form>
</div>