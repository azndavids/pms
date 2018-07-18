<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Form</title>

    <!-- Fonts -->
    <link href="{{ asset('css/base.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/form-input.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>


</head>
<body>
    <div class="main-content">

        <!-- You only need this form and the form-basic.css -->

        <form class="form-basic" method="post" action="#">

            <div class="form-title-row">
                <h1>Create ticket</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Customer name</span>
                    <input type="text" name="name">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Log date</span>
                    <input class="date form-control"  type="text" id="datepicker" name="date">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Target date</span>
                    <input class="date form-control"  type="text" id="datepicker" name="date">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Completed date</span>
                    <input class="date form-control"  type="text" id="datepicker" name="date">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Problem log</span>
                    <textarea name="textarea"></textarea>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Problem title</span>
                    <textarea name="textarea"></textarea>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Product</span>
                    <select name="dropdown">
                        <option>IPVPN</option>
                        <option>ADSL</option>
                        <option>SDSL</option>
                        <option>IP Value</option>
                        <option>IP Lite</option>
                        <option>ISDN BRI</option>
                        <option>ISDN PRI</option>
                        <option>METRO E</option>
                        <option>Multisip</option>
                        <option>PRI Voice</option>
                        <option>BRI voice</option>
                        <option>EFM</option>
                        <option>VSAT</option>
                        <option>DQ</option>
                        <option>IPME</option>
                        <option>3G</option>
                    </select>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Circuit number</span>
                    <input type="text" name="name">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>CTT (If any)</span>
                    <input type="text" name="name">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Responsible team</span>
                    <select name="dropdown">
                        <option>NMOS</option>
                        <option>NMCC</option>
                        <option>ASD IM</option>
                        <option>ISPNM</option>
                        <option>CD</option>
                    </select>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Category</span>
                    <select name="dropdown">
                        <option>Process</option>
                        <option>System</option>
                        <option>People</option>
                        <option>Re-engineering</option>
                        <option>Post-Mortem</option>
                        <option>Repeated Issues</option>
                        <option>Major Incidents</option>
                    </select>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Priority</span>
                    <select name="dropdown">
                        <option>Low</option>
                        <option>Medium</option>
                        <option>High</option>
                    </select>
                </label>
            </div>

            <div class="form-row">
                <!-- <button type="submit">Submit Form</button> -->
                <td><button onclick="location.href='{{ url('welcome') }}'">
                    Submit Form</button></td>
            </div>

        </form>

    </div>
    <script type="text/javascript">  
        $('#datepicker').datepicker({ 
            autoclose: true,   
            format: 'dd-mm-yyyy'  
         });  
    </script>
</body>
</html>
