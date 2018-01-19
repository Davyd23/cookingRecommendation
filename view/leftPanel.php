<!-- Sidebar -->

<div id="sidebar-wrapper">

    <ul class="sidebar-nav">
        <li class="sidebar-brand" style="font-size:14px;cursor:pointer" ng-click="openUserModal()">
                <span ng-if="user!==null">Logged in as: {{user.email}}</span>
                <span ng-if="user==null">Login</span>
            <hr>
        </li>

        <br>
        <li class="sidebar-brand">
            
            <a href="#">

                Your ingredients(<span ng-bind="availableIngredientsList.length"></span>)
            </a>
            <hr>
        </li>
        <br>
        <li class="sidebar-brand">
            <a href="#">
                Cooking Recommendation
            </a>
            <hr>

        </li>
        <br>
        <div ng-repeat="(key, data) in allIngredientsGroupedByCategory">
            <li ng-click="toggleMenuCategory(key)">
                <a href="#">{{key}}
                    <i class="fa fa-plus icon-arrow-right" aria-hidden="true"></i>
                </a>
            </li>
            <div class="ingredient_container" ng-show="isCategoryToggled(key)">
                <span class="ingredient" ng-repeat="ingredient in data">
                    <input type="checkbox" ng-click="toggleIngredientInAvailableList(ingredient)"> {{ingredient}}
                </span>
            </div>
        </div>
    </ul>
</div>

