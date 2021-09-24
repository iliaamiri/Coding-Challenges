<div class="content">
    <div class="row" id="advanceSearchShow_box" style="display: none">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form id="simpleSearch_form">
                    <div class="row">
                        <div class="col-md-2 pr-md-1">
                            <div class="form-group">
                                <label>Examine ( بررسی )</label>
                                <select class="form-control" name="verified">
                                    <option value="">All</option>
                                    <option value="1">Not Returned (بدون برگشت)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 pl-md-1">
                            <div class="form-group">
                                <label>Invoice Key</label>
                                <input type="text" class="form-control" placeholder="Invoice Key"
                                       name="invoice_key">
                            </div>
                        </div>
                        <div class="col-md-2 pl-md-1">
                            <div class="form-group">
                                <label>Order Number</label>
                                <input type="text" class="form-control" placeholder="Bank Code" name="order_number">
                            </div>
                        </div>
                        <div class="col-md-2 col-auto">
                            <div class="form-group">
                                <label>Pan (Card Number)</label>
                                <input type="text" class="form-control" placeholder="card-number user sent"
                                       name="submitted_cardNumber">
                            </div>
                        </div>
                        <div class="col-md-2 col-auto">
                            <div class="form-group">
                                <button onclick="clear_inputs()" class="btn btn-fill btn-default"
                                        style="padding: 10px;">
                                   clear
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button onclick="submit_simpleSearch_form()" class="btn btn-fill btn-default"
                                    style="width: 100%;padding-bottom: 20px;padding-top: 20px; " id="submit_simpleSearch_form_button">
                                Show ( نمایش )
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" onclick="window.location.href = HTTP_SERVER + '/report/logout';" class="btn btn-fill btn-primary"
                                    style="width: 100%" >Change api
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="display: none" id="publicReports_main_box">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Reports</h4>
                    <h4>Api Key : <B id="api_key_to_show"></B></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="tablesorter table" id="reports_main_tbl" style="display: block">
                            <thead class="text-primary">
                            <tr>
                                <th class="text-center">
                                    ID
                                </th>
                                <th class="text-center">
                                    Card Number
                                </th>
                                <th class="text-center">
                                    Amount (RIAL)
                                </th>
                                <th class="text-center">
                                    Status
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

    </div>
</div>