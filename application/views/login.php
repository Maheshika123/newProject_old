<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="row">
        <div class="col-md-4 col-sm-12"></div>
        <div class="col-md-4 col-sm-12">

        <form action="<?=base_url()?>Login/LoginUser" method="post">
            <table class="table" style="width: 100%; margin-top: 175px; margin-bottom: 175px">
                <thead class="thead-inverse">
                    <tr>
                        <th colspan="2"><center><h3>Login</h3></center></th>
                    </tr>
                </thead>
                <tr>
                    <td>User Name :</td>
                    <td>
                        <input class="form-control" type="tel" name="user_name" style="width:100%;" required>
                    </td>
                </tr>

                <tr>
                    <td>Password :</td>
                    <td>
                        <input class="form-control" type="tel" name="password" style="width:100%;" required>
                    </td>
                </tr>

                <tr>
                    <td colspan="2"><center><button id="addOrderItem" class='button -alge center'>Sign In</button></center></td>
                </tr>
            </table>
        </form>

        </div>
    </div>