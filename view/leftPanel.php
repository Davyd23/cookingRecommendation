<!-- Sidebar -->
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="#">
                Start Bootstrap
            </a>
        </li>
        <li ng-repeat="(key, data) in allIngredientsGroupedByCategory">
            <a href="#">{{key}}
                <ul>
                    <li ng-repeat="ingredient in data">
                        <span">{{ingredient}}</span>
                    </li>
                </ul>
            </a>
        </li>
    </ul>
</div>

