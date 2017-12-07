<div id="page-content-wrapper">
    <div class="container-fluid">
        <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
        <button ng-click="getReceipes()" class="btn btn-primary">Search Receipes</button>




        <div id="receipesContainer">
            <div class="col-md-4" ng-repeat="(key, data) in receipes">
                <span style="color: blue">{{key}}</span>
                <ul>
                    <li ng-repeat="ingredient in data">
                        <span ng-bind="ingredient"></span>
                    </li>
                </ul>
            </div>
        </div>





    </div>
</div>



<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>