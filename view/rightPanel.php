<div id="page-content-wrapper">
    <div class="container-fluid">
        <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
        <button ng-click="getReceipes()" class="btn btn-primary">Search Receipes</button>


        <div id="receipesContainer">
            <div id="receipe" ng-repeat="(key, data) in receipes track by $index">
                <div class="col-md-1"></div>
                <div class="col-md-2 receipePreview" ng-click="openReceipeModal(data)">
                    <span class="receipePreviewTitle">{{data.receipeName}}</span>
                    <ul style="text-align: left;">
                        <li ng-repeat="ingredient in data.ingredients track by $index">
                            <span ng-class="{green: ingredientInList(ingredient.ingredientName)}"
                                  ng-bind="ingredient.ingredientName"></span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-1"></div>
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