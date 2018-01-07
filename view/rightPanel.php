<div id="page-content-wrapper">
    <div class="container-fluid">
        <!-- <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a> -->
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
                        <span ng-bind="ingredient" ng-class="{green: ingredientInList(ingredient)}"></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>



<!-- <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script> -->