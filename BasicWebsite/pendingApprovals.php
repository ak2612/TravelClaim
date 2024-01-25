<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'includes/datatables.php'; ?>
</head>

<body>
    <div class="container pt-3 p-2">
        <div class="row g-3">
            <div class="col-md-2">
                <input class="form-control me-2" type="text" id="searchNoReport" placeholder="Search Request No" aria-label="Search">
            </div>
            <div class="col-md-2">
                <input class="form-control me-2" type="text" id="searchCaseReport" placeholder="Search Case No" aria-label="Search">
            </div>
            <div class="col-md-2">
                <select id="projectListReport" class="form-select" name="projectListReport">
                    <option value="">Select Project</option>
                    <option value="@p.Key">@p.Value</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="text" id="min" name="min" class="form-control" placeholder="receivedOnFrom" required />
            </div>
            <div class="col-md-2">
                <input type="text" id="max" name="max" class="form-control" placeholder="receivedOnTo" required />
            </div>
        </div>
        <br />
        <table class="table table-striped table-hover" id="pending" style="width:100%">
            <thead>
                <tr>
                    <th>Print Summary</th>
                    <th style="min-width:65px">Req. No.</th>
                    <th>CaseNo</th>
                    <th>RecdOn</th>
                    <th>AgrParty</th>
                    <th>RecdFrom</th>
                    <th>OthersReceiveddFrom</th>
                    <th>RefNo_Internal</th>
                    <th>RefNo_External</th>
                    <th>ReqType</th>
                    <th>Project</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            </tbody>
        </table>
    </div>
<script>
    new DataTable('#pending');
</script>
</body>

</html>