<div id="page-content-wrapper">
    <div class="container-fluid">
        <h1>Simple Sidebar</h1>
        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
        <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
        <button ng-click="getReceipes()" class="btn btn-primary">Search Recipes</button>
        <link rel='stylesheet' type='text/css' href='css/main.css'>
        <br>
        <br>
        <div id="news">

</div>


        <div id="receipesContainer">
            <div class="col-md-4" ng-repeat="(key, data) in receipes track by $index">
                <span style="color: blue">{{data.receipeName}}</span>
                <ul>
                    <li ng-repeat="ingredient in data.ingredients">
                        <span ng-bind="ingredient"></span>
                    </li>
                </ul>
            </div>
        </div>
        <button ng-click="getReceipes()" class="btn btn-primary">Search Receipes</button>




        <div id="receipesContainer">
            <div class="col-md-4" ng-repeat="(key, data) in receipes track by $index">
                <span style="color: blue">{{data.receipeName}}</span>
                <ul>
                    <li ng-repeat="ingredient in data.ingredients">
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