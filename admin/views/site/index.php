<?php
$this->title = 'My Yii Application';

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');

$this->registerCssFile($directoryAsset.'/assets/node_modules/footable/css/footable.core.css');
$this->registerCssFile($directoryAsset.'/assets/node_modules/bootstrap-select/bootstrap-select.min.css');
$this->registerJsFile($directoryAsset.'/assets/node_modules/footable/js/footable.all.min.js');
?>

<!-- Column -->
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Row Toggler</h4>
        <h6 class="card-subtitle">Create your table with Toggle Footable</h6>
        <table id="demo-foo-row-toggler" class="table toggle-circle table-hover">
            <thead>
                <tr>
                    <th data-toggle="true"> First Name </th>
                    <th> Last Name </th>
                    <th data-hide="phone"> Job Title </th>
                    <th data-hide="all"> DOB </th>
                    <th data-hide="all"> Status </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Isidra</td>
                    <td>Boudreaux</td>
                    <td>Traffic Court Referee</td>
                    <td>22 Jun 1972</td>
                    <td><span class="label label-table label-success">Active</span></td>
                </tr>
                <tr>
                    <td>Shona</td>
                    <td>Woldt</td>
                    <td>Airline Transport Pilot</td>
                    <td>3 Oct 1981</td>
                    <td><span class="label label-table label-inverse">Disabled</span></td>
                </tr>
                <tr>
                    <td>Granville</td>
                    <td>Leonardo</td>
                    <td>Business Services Sales Representative</td>
                    <td>19 Apr 1969</td>
                    <td><span class="label label-table label-danger">Suspended</span></td>
                </tr>
                <tr>
                    <td>Easer</td>
                    <td>Dragoo</td>
                    <td>Drywall Stripper</td>
                    <td>13 Dec 1977</td>
                    <td><span class="label label-table label-success">Active</span></td>
                </tr>
                <tr>
                    <td>Maple</td>
                    <td>Halladay</td>
                    <td>Aviation Tactical Readiness Officer</td>
                    <td>30 Dec 1991</td>
                    <td><span class="label label-table label-danger">Suspended</span></td>
                </tr>
                <tr>
                    <td>Maxine</td>
                    <td><a href="javascript:void(0)">Woldt</a></td>
                    <td><a href="javascript:void(0)">Business Services Sales Representative</a></td>
                    <td>17 Oct 1987</td>
                    <td><span class="label label-table label-inverse">Disabled</span></td>
                </tr>
                <tr>
                    <td>Lorraine</td>
                    <td>Mcgaughy</td>
                    <td>Hemodialysis Technician</td>
                    <td>11 Nov 1983</td>
                    <td><span class="label label-table label-inverse">Disabled</span></td>
                </tr>
                <tr>
                    <td>Lizzee</td>
                    <td><a href="javascript:void(0)">Goodlow</a></td>
                    <td>Technical Services Librarian</td>
                    <td>1 Nov 1961</td>
                    <td><span class="label label-table label-danger">Suspended</span></td>
                </tr>
                <tr>
                    <td>Judi</td>
                    <td>Badgett</td>
                    <td>Electrical Lineworker</td>
                    <td>23 Jun 1981</td>
                    <td><span class="label label-table label-success">Active</span></td>
                </tr>
                <tr>
                    <td>Lauri</td>
                    <td>Hyland</td>
                    <td>Blackjack Supervisor</td>
                    <td>15 Nov 1985</td>
                    <td><span class="label label-table label-danger">Suspended</span></td>
                </tr>
                <tr>
                    <td>Isidra</td>
                    <td>Boudreaux</td>
                    <td>Traffic Court Referee</td>
                    <td>22 Jun 1972</td>
                    <td><span class="label label-table label-success">Active</span></td>
                </tr>
                <tr>
                    <td>Shona</td>
                    <td>Woldt</td>
                    <td>Airline Transport Pilot</td>
                    <td>3 Oct 1981</td>
                    <td><span class="label label-table label-inverse">Disabled</span></td>
                </tr>
                <tr>
                    <td>Granville</td>
                    <td>Leonardo</td>
                    <td>Business Services Sales Representative</td>
                    <td>19 Apr 1969</td>
                    <td><span class="label label-table label-danger">Suspended</span></td>
                </tr>
                <tr>
                    <td>Easer</td>
                    <td>Dragoo</td>
                    <td>Drywall Stripper</td>
                    <td>13 Dec 1977</td>
                    <td><span class="label label-table label-success">Active</span></td>
                </tr>
                <tr>
                    <td>Maple</td>
                    <td>Halladay</td>
                    <td>Aviation Tactical Readiness Officer</td>
                    <td>30 Dec 1991</td>
                    <td><span class="label label-table label-danger">Suspended</span></td>
                </tr>
                <tr>
                    <td>Maxine</td>
                    <td><a href="javascript:void(0)">Woldt</a></td>
                    <td><a href="javascript:void(0)">Business Services Sales Representative</a></td>
                    <td>17 Oct 1987</td>
                    <td><span class="label label-table label-inverse">Disabled</span></td>
                </tr>
                <tr>
                    <td>Lorraine</td>
                    <td>Mcgaughy</td>
                    <td>Hemodialysis Technician</td>
                    <td>11 Nov 1983</td>
                    <td><span class="label label-table label-inverse">Disabled</span></td>
                </tr>
                <tr>
                    <td>Lizzee</td>
                    <td><a href="javascript:void(0)">Goodlow</a></td>
                    <td>Technical Services Librarian</td>
                    <td>1 Nov 1961</td>
                    <td><span class="label label-table label-danger">Suspended</span></td>
                </tr>
                <tr>
                    <td>Judi</td>
                    <td>Badgett</td>
                    <td>Electrical Lineworker</td>
                    <td>23 Jun 1981</td>
                    <td><span class="label label-table label-success">Active</span></td>
                </tr>
                <tr>
                    <td>Lauri</td>
                    <td>Hyland</td>
                    <td>Blackjack Supervisor</td>
                    <td>15 Nov 1985</td>
                    <td><span class="label label-table label-danger">Suspended</span></td>
                </tr>
                <tr>
                    <td>Isidra</td>
                    <td>Boudreaux</td>
                    <td>Traffic Court Referee</td>
                    <td>22 Jun 1972</td>
                    <td><span class="label label-table label-success">Active</span></td>
                </tr>
                <tr>
                    <td>Shona</td>
                    <td>Woldt</td>
                    <td>Airline Transport Pilot</td>
                    <td>3 Oct 1981</td>
                    <td><span class="label label-table label-inverse">Disabled</span></td>
                </tr>
                <tr>
                    <td>Granville</td>
                    <td>Leonardo</td>
                    <td>Business Services Sales Representative</td>
                    <td>19 Apr 1969</td>
                    <td><span class="label label-table label-danger">Suspended</span></td>
                </tr>
                <tr>
                    <td>Easer</td>
                    <td>Dragoo</td>
                    <td>Drywall Stripper</td>
                    <td>13 Dec 1977</td>
                    <td><span class="label label-table label-success">Active</span></td>
                </tr>
                <tr>
                    <td>Maple</td>
                    <td>Halladay</td>
                    <td>Aviation Tactical Readiness Officer</td>
                    <td>30 Dec 1991</td>
                    <td><span class="label label-table label-danger">Suspended</span></td>
                </tr>
                <tr>
                    <td>Maxine</td>
                    <td><a href="javascript:void(0)">Woldt</a></td>
                    <td><a href="javascript:void(0)">Business Services Sales Representative</a></td>
                    <td>17 Oct 1987</td>
                    <td><span class="label label-table label-inverse">Disabled</span></td>
                </tr>
                <tr>
                    <td>Lorraine</td>
                    <td>Mcgaughy</td>
                    <td>Hemodialysis Technician</td>
                    <td>11 Nov 1983</td>
                    <td><span class="label label-table label-inverse">Disabled</span></td>
                </tr>
                <tr>
                    <td>Lizzee</td>
                    <td><a href="javascript:void(0)">Goodlow</a></td>
                    <td>Technical Services Librarian</td>
                    <td>1 Nov 1961</td>
                    <td><span class="label label-table label-danger">Suspended</span></td>
                </tr>
                <tr>
                    <td>Judi</td>
                    <td>Badgett</td>
                    <td>Electrical Lineworker</td>
                    <td>23 Jun 1981</td>
                    <td><span class="label label-table label-success">Active</span></td>
                </tr>
                <tr>
                    <td>Lauri</td>
                    <td>Hyland</td>
                    <td>Blackjack Supervisor</td>
                    <td>15 Nov 1985</td>
                    <td><span class="label label-table label-danger">Suspended</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        $('#demo-foo-row-toggler').footable();
    });
</script>