<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Advanced Search</h5>
                </div>
                <div class="card-body">
                    <form id="advancedSearch_form">
                        <div class="row">
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label>Api Key</label>
                                    <input type="text" class="form-control" placeholder="Api Key"
                                           name="api_key">
                                </div>
                            </div>
                            <div class="col-md-3 px-md-1">
                                <div class="form-group">
                                    <label>Invoice Key</label>
                                    <input type="text" class="form-control" placeholder="Invoice Key"
                                           name="invoice_key">
                                </div>
                            </div>
                            <div class="col-md-2 pl-md-1">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="number" min="100" class="form-control" placeholder="Amount"
                                           name="amount">
                                </div>
                            </div>
                            <div class="col-md-3 pl-md-1">
                                <div class="form-group">
                                    <label>Bank Code</label>
                                    <input type="text" class="form-control" placeholder="Bank Code" name="bank_code">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 pr-md-1">
                                <div class="form-group">
                                    <label>Return Url</label>
                                    <input type="text" class="form-control" placeholder="Return Url" name="return_url">
                                </div>
                            </div>
                            <div class="col-md-4 pl-md-1">
                                <div class="form-group">
                                    <label>Creation Time</label>
                                    <input type="date" class="form-control"
                                           placeholder="Time zone in Tehran, Tehran Province, Iran (GMT+3:30)"
                                           title="Time zone in Tehran, Tehran Province, Iran (GMT+3:30)"
                                           name="creation_time">
                                </div>
                            </div>
                            <div class="col-md-3 pl-md-1">
                                <div class="form-group">
                                    <label>Last Ip</label>
                                    <input type="text" class="form-control" placeholder="0.0.0.0"
                                           title="Last ip address user used" name="last_user_ip">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="-">-</option>
                                        <option value="1">Success</option>
                                        <option value="11">PreSuccess</option>
                                        <option value="0">In Progress</option>
                                        <option value="-11">Canceled by user</option>
                                        <option value="-1">-1</option>
                                        <option value="-2">-2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>last submit time</label>
                                    <input type="date" class="form-control" name="last_submit_time" title="last submit time">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>last otpRequest time</label>
                                    <input type="date" class="form-control" name="last_otpRequest_time"
                                           title="last otpRequest time">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label>submit attempt</label>
                                    <input type="number" min="0" max="20" class="form-control"
                                           placeholder="user submit attempt" name="attempt_num_submit"
                                           title="user submit attempt" id="attempt_num_submit_edit">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label>Otp Request attempt</label>
                                    <input type="number" min="0" max="20" class="form-control"
                                           placeholder="user otpRequest attempt" name="attempt_num_otpRequest"
                                           title="user otpRequest attempt">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label>Reset Captcha attempt</label>
                                    <input type="number" min="0" max="20" class="form-control"
                                           placeholder="user resetCaptcha attempt" name="attempt_num_resetCaptcha"
                                           title="user resetCaptcha attempt">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label>Cancel attempt</label>
                                    <input type="number" min="0" max="20" class="form-control"
                                           placeholder="user cancel attempt" name="attempt_num_cancel"
                                           title="user cancel attempt">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label>Submitted card-number</label>
                                    <input type="text" class="form-control" placeholder="card-number user sent"
                                           name="submitted_cardNumber">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label>Submitted cvv2</label>
                                    <input type="text" class="form-control" placeholder="cvv2 user sent"
                                           name="submitted_cvv2">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label>Submitted email</label>
                                    <input type="email" class="form-control" placeholder="email user sent"
                                           name="submitted_email">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary" onclick="submit_advancedSearch_form()"
                            id="submit_advancedSearch_form_button">Search
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Reports</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="tablesorter table" id="reports_main_tbl" style="display: block">
                            <thead class="text-primary">
                            <tr>
                                <th class="text-center">
                                    Edit
                                </th>
                                <th class="text-center">
                                    Delete
                                </th>
                                <th class="text-center">
                                    ID
                                </th>
                                <th class="text-center">
                                    API KEY
                                </th>
                                <th class="text-center">
                                    Amount (RIAL)
                                </th>
                                <th class="text-center">
                                    Status
                                </th>
                                <th class="text-center">
                                    Card Number
                                </th>
                                <th class="text-center">
                                    Transaction Date
                                </th>
                                <th class="text-center">
                                    Bank Code
                                </th>
                                <th class="text-center">
                                    Return Validation
                                </th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8" id="edit_transaction_box8" style="display: none">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Edit Transaction</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <input type="hidden" name="last_invoice_key">
                            <div class="col-md-4 px-md-1">
                                <div class="form-group">
                                    <label>Invoice Key</label>
                                    <input type="text" class="form-control" placeholder="Invoice Key" name="invoice_key" id="invoice_key_edit">
                                </div>
                            </div>
                            <div class="col-md-4 pl-md-1">
                                <div class="form-group">
                                    <label>Api Key</label>
                                    <input type="text" class="form-control" placeholder="Api Key" name="api_key" id="api_key_edit">
                                </div>
                            </div>
                            <div class="col-md-2 pr-md-1">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="number" class="form-control" placeholder="Amount" name="amount" id="amount_edit">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>submit attempt</label>
                                    <input type="number" min="0" max="20" class="form-control"
                                           placeholder="user submit attempt" name="attempt_num_submit"
                                           title="user submit attempt">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9 pr-md-1">
                                <div class="form-group">
                                    <label>return url</label>
                                    <input type="text" class="form-control"
                                           placeholder="http://www.example.com" name="return_url"
                                           title="http://www.example.com" id="return_url_edit">
                                </div>
                            </div>
                            <div class="col-md-3 pr-md-1">
                                <div class="form-group">
                                    <label>Last ResetCaptcha Time</label>
                                    <input type="datetime-local" class="form-control"
                                           placeholder="last resetCaptcha time" name="last_resetCaptcha_time"
                                           title="last resetCaptcha time">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 pr-md-1">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" id="status_edit">
                                        <option value="-">-</option>
                                        <option value="1">Success</option>
                                        <option value="11">PreSuccess</option>
                                        <option value="0">In Progress</option>
                                        <option value="-11">Canceled by user</option>
                                        <option value="-1">-1</option>
                                        <option value="-2">-2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 pr-md-1">
                                <div class="form-group">
                                    <label>Creation time</label>
                                    <input type="datetime-local" class="form-control" name="creation_time"
                                           title="Creation time" id="creation_time_edit">
                                </div>
                            </div>
                            <div class="col-md-3 pr-md-1">
                                <div class="form-group">
                                    <label>last submit time</label>
                                    <input type="datetime-local" class="form-control" name="last_submit_time"
                                           title="last submit time" id="last_submit_time_edit">
                                </div>
                            </div>
                            <div class="col-md-3 pr-md-1">
                                <div class="form-group">
                                    <label>last otpRequest time</label>
                                    <input type="datetime-local" class="form-control" name="last_otpRequest_time"
                                           title="last otpRequest time" id="last_otpRequest_time_edit">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Last Ip</label>
                                    <input type="text" class="form-control" placeholder="0.0.0.0"
                                           title="Last ip address user used" name="last_user_ip" id="last_user_ip_edit">
                                </div>
                            </div>
                            <div class="col-md-3 pl-md-1">
                                <div class="form-group">
                                    <label>Last Browser</label>
                                    <input type="text" class="form-control" placeholder="Chrome,Firefox,..."
                                           title="Last browser user used" name="last_browser_used">
                                </div>
                            </div>
                            <div class="col-md-3 pl-md-1">
                                <div class="form-group">
                                    <label>Last OS</label>
                                    <input type="text" class="form-control" placeholder="Windows,Linux,..."
                                           title="Last OS user used" name="last_os_used">
                                </div>
                            </div>
                            <div class="col-md-3 pl-md-1">
                                <div class="form-group">
                                    <label>Bank Code</label>
                                    <input type="text" class="form-control" placeholder="bank code"
                                           title="Bank Code" name="bank_code" id="bank_code_edit">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Otp Request attempt</label>
                                    <input type="number" min="0" max="20" class="form-control"
                                           placeholder="user otpRequest attempt" name="attempt_num_otpRequest"
                                           title="user otpRequest attempt" id="attempt_num_otpRequest_edit">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Reset Captcha attempt</label>
                                    <input type="number" min="0" max="20" class="form-control"
                                           placeholder="user resetCaptcha attempt" name="attempt_num_resetCaptcha"
                                           title="user resetCaptcha attempt" id="attempt_num_resetCaptcha_edit">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Cancel attempt</label>
                                    <input type="number" min="0" max="20" class="form-control"
                                           placeholder="user cancel attempt" name="attempt_num_cancel"
                                           title="user cancel attempt" id="attempt_num_cancel_edit">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Last Submit Status</label>
                                    <select class="form-control" name="last_submit_status">
                                        <option value="-">-</option>
                                        <option value="1">Success</option>
                                        <option value="11">PreSuccess</option>
                                        <option value="0">In Progress</option>
                                        <option value="-11">Canceled by user</option>
                                        <option value="-1">-1</option>
                                        <option value="-2">-2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>TEST</label>
                                    <input type="text" class="form-control" placeholder="" title="TEST" name="TEST">
                                </div>
                            </div>
                            <div class="col-md-3 pl-md-1">
                                <div class="form-group">
                                    <label>Last Captcha User Saw</label>
                                    <input type="number" class="form-control" placeholder="Last Captcha User Saw"
                                           name="last_captcha_user_saw" title="Last Captcha User Saw">
                                </div>
                            </div>
                            <div class="col-md-7 pl-md-1">
                                <div class="form-group">
                                    <label>Last Error User Saw</label>
                                    <input type="text" class="form-control" placeholder="Last Error User Saw"
                                           name="last_error_user_saw" title="Last Error User Saw">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>WAITASEC</label>
                                    <textarea rows="10" cols="80" class="form-control" name="WAITASEC"
                                              placeholder="WAITASEC: selenium serialized session "></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last post params</label>
                                    <textarea rows="10" cols="80" class="form-control" name="last_post_params"
                                              placeholder="last post params"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary" onclick="submit_editReport_button()">Save</button>
                    <button type="submit" class="btn btn-fill btn-danger" onclick="cancel_editReport_button()">Cancel</button>
                </div>
            </div>
        </div>
        <div class="col-md-4" id="edit_transaction_box4" style="display: none">
            <div class="card card-user">
                <div class="card-body">
                    <div class="author">
                        <div class="block block-one"></div>
                        <div class="block block-two"></div>
                        <div class="block block-three"></div>
                        <div class="block block-four"></div>
                        <form>
                            <div class="row">
                                <div class="col-md-12 pr-md-1">
                                    <div class="form-group">
                                        <label>Auto Filling Card-number</label>
                                        <input type="text" class="form-control" placeholder="xxxx xxxx xxxx xxxx"
                                               style="text-align: center" name="auto_filling_cardNumber">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-md-1">
                                    <div class="form-group">
                                        <label>Auto Filling Cvv2</label>
                                        <input type="text" class="form-control" placeholder="xxxxxx"
                                               style="text-align: center" name="auto_filling_cvv2">
                                    </div>
                                </div>
                                <div class="col-md-4 pr-md-1">
                                    <div class="form-group">
                                        <label>Auto Filling Month</label>
                                        <input type="text" class="form-control" placeholder="xx"
                                               style="text-align: center" name="auto_filling_month">
                                    </div>
                                </div>
                                <div class="col-md-4 pr-md-1">
                                    <div class="form-group">
                                        <label>Auto Filling Year</label>
                                        <input type="text" class="form-control" placeholder="xx"
                                               style="text-align: center" name="auto_filling_year">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-md-1">
                                    <div class="form-group">
                                        <label>Auto Filling Captcha</label>
                                        <input type="text" class="form-control" placeholder="xxxxxxxx"
                                               style="text-align: center" name="auto_filling_captcha">
                                    </div>
                                </div>
                                <div class="col-md-6 pr-md-1">
                                    <div class="form-group">
                                        <label>Auto Filling Password</label>
                                        <input type="text" class="form-control" placeholder="xxxxxxxx"
                                               style="text-align: center" name="auto_filling_password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 pr-md-1">
                                    <div class="form-group">
                                        <label>Auto Filling Email</label>
                                        <input type="text" class="form-control" placeholder="example@example.com"
                                               style="text-align: center" name="auto_filling_email">
                                    </div>
                                </div>
                            </div>
                            <hr style="border-top: 2px solid #2b3553;">
                            <div class="row">
                                <div class="col-md-12 pr-md-1">
                                    <div class="form-group">
                                        <label>Submitted Card-number</label>
                                        <input type="text" class="form-control" disabled=""
                                               placeholder="xxxx xxxx xxxx xxxx" style="text-align: center"
                                               name="submitted_cardNumber" id="submitted_cardNumber_edit">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-md-1">
                                    <div class="form-group">
                                        <label>Submitted Cvv2</label>
                                        <input type="text" class="form-control" disabled="" placeholder="xxxxxx"
                                               style="text-align: center" name="submitted_cvv2" id="submitted_cvv2_edit">
                                    </div>
                                </div>
                                <div class="col-md-4 pr-md-1">
                                    <div class="form-group">
                                        <label>Submitted Month</label>
                                        <input type="text" class="form-control" disabled="" placeholder="xx"
                                               style="text-align: center" name="submitted_month">
                                    </div>
                                </div>
                                <div class="col-md-4 pr-md-1">
                                    <div class="form-group">
                                        <label>Submitted Year</label>
                                        <input type="text" class="form-control" disabled="" placeholder="xx"
                                               style="text-align: center" name="submitted_year">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-md-1">
                                    <div class="form-group">
                                        <label>Submitted Captcha</label>
                                        <input type="text" class="form-control" disabled="" placeholder="xxxxxxxx"
                                               style="text-align: center" name="submitted_captcha">
                                    </div>
                                </div>
                                <div class="col-md-6 pr-md-1">
                                    <div class="form-group">
                                        <label>Submitted Password</label>
                                        <input type="text" class="form-control" disabled="" placeholder="xxxxxxxx"
                                               style="text-align: center" name="submitted_password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 pr-md-1">
                                    <div class="form-group">
                                        <label>Submitted Email</label>
                                        <input type="text" class="form-control" disabled=""
                                               placeholder="example@example.com" style="text-align: center"
                                               name="submitted_email" id="submitted_email_edit">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>