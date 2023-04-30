<?php require 'motal_window1_header.php';?>

        <div ng-controller="ModalDemoCtrl as $ctrl" class="modal-demo">
            <script type="text/ng-template" id="myModalContent.html">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-title">アンケート</h3>
                </div>

                <form action="modal_window1_output.php" method="post">
                <div class="modal-body" id="modal-body">
                    <input type="radio" name="present" value="0">プレゼントです。
                    <br>
                    <input type="radio" name="present" value="1">プレゼントではない。
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" ng-click="$ctrl.ok()">OK</button>
                    <button class="btn btn-warning" type="button" ng-click="$ctrl.cancel()">Cancel</button>
                </div>
                </form>
            </script>

            <button type="button" class="btn btn-default" ng-click="$ctrl.open('sm')">購入する</button>

        </div>




  </body>
</html>