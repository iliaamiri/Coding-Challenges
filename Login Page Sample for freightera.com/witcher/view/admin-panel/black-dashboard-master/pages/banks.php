<div class="content">
    <div class="row">
        <div class="col-md-12" id="bank_main_tbl_box">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Banks</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="tablesorter table" id="banks_main_tbl" style="display: block;">
                            <thead class="text-primary">
                            <tr>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>
                                <th class="text-center">
                                    ID
                                </th>
                                <th class="text-center">
                                    BANK NAME
                                </th>
                                <th class="text-center">
                                    cardNumber_input
                                </th>
                                <th class="text-center">
                                    card_number_input_pan1
                                </th>
                                <th class="text-center">
                                    card_number_input_pan2
                                </th>
                                <th class="text-center">
                                    card_number_input_pan3
                                </th>
                                <th class="text-center">
                                    card_number_input_pan4
                                </th>
                                <th class="text-center">
                                    cvv2_input
                                </th>
                                <th class="text-center">
                                    month_input
                                </th>
                                <th class="text-center">
                                    year_input
                                </th>
                                <th class="text-center">
                                    captcha_input
                                </th>
                                <th class="text-center">
                                    password_input
                                </th>
                                <th class="text-center">
                                    email_input
                                </th>
                                <th class="text-center">
                                    resetCaptcha_button
                                </th>
                                <th class="text-center">
                                    otpRequest_button
                                </th>
                                <th class="text-center">
                                    submit_button
                                </th>
                                <th class="text-center">
                                    cancel_button
                                </th>
                                <th class="text-center">
                                    return_button
                                </th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-success" id="addNewBank_showButton" onclick="show_addNewBank_form()">New +</button>
                </div>
            </div>
        </div>
        <div class="col-md-12" id="addNewBank_box" style="display: none">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Add a new bank</h5>
                </div>
                <div class="card-body">
                    <form id="addNewBank_form">
                        <div class="row">
                            <div class="col-md-2 pr-md-1">
                                <div class="form-group">
                                    <label>Bank Name</label>
                                    <input type="text" name="bankName" class="form-control" placeholder="Bank Name">
                                </div>
                            </div>
                            <div class="col-md-2 px-md-1">
                                <div class="form-group">
                                    <label>cardNumber input LocatorStrategy</label>
                                    <select name="cardNumber_input_LocatorStrategy" class="form-control">
                                        <option>-</option>
                                        <option value="name">name</option>
                                        <option value="id">id</option>
                                        <option value="class">class</option>
                                        <option value="xpath">xpath</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="cardNumber input LocatorStrategy value" name="cardNumber_input_LocatorStrategy_value">
                                </div>
                            </div>
                            <div class="col-md-2 px-md-1">
                                <div class="form-group">
                                    <label>card_number input pan1 LocatorStrategy</label>
                                    <select name="card_number_input_pan1_LocatorStrategy" class="form-control">
                                        <option>-</option>
                                        <option value="name">name</option>
                                        <option value="id">id</option>
                                        <option value="class">class</option>
                                        <option value="xpath">xpath</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="card_number input pan1 LocatorStrategy value" name="card_number_input_pan1_LocatorStrategy_value">
                                </div>
                            </div>
                            <div class="col-md-2 px-md-1">
                                <div class="form-group">
                                    <label>card_number input pan2 LocatorStrategy</label>
                                    <select name="card_number_input_pan2_LocatorStrategy" class="form-control">
                                        <option>-</option>
                                        <option value="name">name</option>
                                        <option value="id">id</option>
                                        <option value="class">class</option>
                                        <option value="xpath">xpath</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="card_number input pan2 LocatorStrategy value" name="card_number_input_pan2_LocatorStrategy_value">
                                </div>
                            </div>
                            <div class="col-md-2 px-md-1">
                                <div class="form-group">
                                    <label>card_number input pan3 LocatorStrategy</label>
                                    <select name="card_number_input_pan3_LocatorStrategy" class="form-control">
                                        <option>-</option>
                                        <option value="name">name</option>
                                        <option value="id">id</option>
                                        <option value="class">class</option>
                                        <option value="xpath">xpath</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="card_number input pan3 LocatorStrategy value" name="card_number_input_pan3_LocatorStrategy_value">
                                </div>
                            </div>

                            <div class="col-md-2 px-md-2">
                                <div class="form-group">
                                    <label>card_number input pan4 LocatorStrategy</label>
                                    <select name="card_number_input_pan4_LocatorStrategy" class="form-control">
                                        <option>-</option>
                                        <option value="name">name</option>
                                        <option value="id">id</option>
                                        <option value="class">class</option>
                                        <option value="xpath">xpath</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="card_number input pan4 LocatorStrategy value" name="card_number_input_pan4_LocatorStrategy_value">
                                </div>
                            </div>
                            <div class="col-md-2 px-md-1">
                                <div class="form-group">
                                    <label>cvv2 input LocatorStrategy</label>
                                    <select name="cvv2_input_LocatorStrategy" class="form-control">
                                        <option>-</option>
                                        <option value="name">name</option>
                                        <option value="id">id</option>
                                        <option value="class">class</option>
                                        <option value="xpath">xpath</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="cvv2 input LocatorStrategy value" name="cvv2_input_LocatorStrategy_value">
                                </div>
                            </div>
                            <div class="col-md-2 px-md-1">
                                <div class="form-group">
                                    <label>month input LocatorStrategy</label>
                                    <select name="month_input_LocatorStrategy" class="form-control">
                                        <option>-</option>
                                        <option value="name">name</option>
                                        <option value="id">id</option>
                                        <option value="class">class</option>
                                        <option value="xpath">xpath</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="month input LocatorStrategy value" name="month_input_LocatorStrategy_value">
                                </div>
                            </div>
                            <div class="col-md-2 px-md-1">
                                <div class="form-group">
                                    <label>year input LocatorStrategy</label>
                                    <select name="year_input_LocatorStrategy" class="form-control">
                                        <option>-</option>
                                        <option value="name">name</option>
                                        <option value="id">id</option>
                                        <option value="class">class</option>
                                        <option value="xpath">xpath</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="year input LocatorStrategy value" name="year_input_LocatorStrategy_value">
                                </div>
                            </div>
                            <div class="col-md-2 px-md-1">
                                <div class="form-group">
                                    <label>captcha input LocatorStrategy</label>
                                    <select name="captcha_input_LocatorStrategy" class="form-control">
                                        <option>-</option>
                                        <option value="name">name</option>
                                        <option value="id">id</option>
                                        <option value="class">class</option>
                                        <option value="xpath">xpath</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="captcha input LocatorStrategy value" name="captcha_input_LocatorStrategy_value">
                                </div>
                            </div>
                            <div class="col-md-2 px-md-1">
                                <div class="form-group">
                                    <label>password input LocatorStrategy</label>
                                    <select name="password_input_LocatorStrategy" class="form-control">
                                        <option>-</option>
                                        <option value="name">name</option>
                                        <option value="id">id</option>
                                        <option value="class">class</option>
                                        <option value="xpath">xpath</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="password input LocatorStrategy value" name="password_input_LocatorStrategy_value">
                                </div>
                            </div>
                            <div class="col-md-2 px-md-1">
                                <div class="form-group">
                                    <label>email input LocatorStrategy</label>
                                    <select name="email_input_LocatorStrategy" class="form-control">
                                        <option>-</option>
                                        <option value="name">name</option>
                                        <option value="id">id</option>
                                        <option value="class">class</option>
                                        <option value="xpath">xpath</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="email input LocatorStrategy value" name="email_input_LocatorStrategy_value">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 px-md-1">
                                <div class="form-group">
                                    <label>resetCaptcha button LocatorStrategy</label>
                                    <select name="resetCaptcha_button_LocatorStrategy" class="form-control">
                                        <option>-</option>
                                        <option value="name">name</option>
                                        <option value="id">id</option>
                                        <option value="class">class</option>
                                        <option value="xpath">xpath</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="resetCaptcha button LocatorStrategy value" name="resetCaptcha_button_LocatorStrategy_value">
                                </div>
                            </div>
                            <div class="col-md-3 px-md-1">
                                <div class="form-group">
                                    <label>otpRequest button LocatorStrategy</label>
                                    <select name="otpRequest_button_LocatorStrategy" class="form-control">
                                        <option>-</option>
                                        <option value="name">name</option>
                                        <option value="id">id</option>
                                        <option value="class">class</option>
                                        <option value="xpath">xpath</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="otpRequest button LocatorStrategy value" name="otpRequest_button_LocatorStrategy_value">
                                </div>
                            </div>
                            <div class="col-md-3 px-md-1">
                                <div class="form-group">
                                    <label>submit button LocatorStrategy</label>
                                    <select name="submit_button_LocatorStrategy" class="form-control">
                                        <option>-</option>
                                        <option value="name">name</option>
                                        <option value="id">id</option>
                                        <option value="class">class</option>
                                        <option value="xpath">xpath</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="submit button LocatorStrategy value" name="submit_button_LocatorStrategy_value">
                                </div>
                            </div>
                            <div class="col-md-3 px-md-1">
                                <div class="form-group">
                                    <label>cancel button LocatorStrategy</label>
                                    <select name="cancel_button_LocatorStrategy" class="form-control">
                                        <option>-</option>
                                        <option value="name">name</option>
                                        <option value="id">id</option>
                                        <option value="class">class</option>
                                        <option value="xpath">xpath</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="cancel button LocatorStrategy value" name="cancel_button_LocatorStrategy_value">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 px-md-1">
                                <div class="form-group">
                                    <label>return button LocatorStrategy</label>
                                    <select name="return_button_LocatorStrategy" class="form-control">
                                        <option>-</option>
                                        <option value="name">name</option>
                                        <option value="id">id</option>
                                        <option value="class">class</option>
                                        <option value="xpath">xpath</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="return button LocatorStrategy value" name="return_button_LocatorStrategy_value">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary" onclick="submit_addNewBank_form()" id="submit_addNewBank_form_button">Done</button>
                </div>
            </div>
        </div>
    </div>
</div>
