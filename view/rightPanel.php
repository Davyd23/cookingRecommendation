<div id="page-content-wrapper">
    <div class="container-fluid">
        <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
        <button ng-click="getReceipes()" class="btn btn-primary">Search Receipes</button>

        <label>Sort By:</label>
        <select ng-model="selected.sortBy">
            <option value="t">Trending</option>
            <option value="r">Top Rated</option>
        </select>

        <br>
        <br>
        <br>
        <div id="receipesContainer" class="container" style="text-align:center;">
            <div id="receipe" class="receipePreview" ng-repeat="receipe in receipes track by $index ">
                <a target="_blank" href="{{receipe.f2f_url}}">
                    <span class="receipePreviewTitle">{{receipe.title}}</span>

                    <div>
                        <img style="width:100%; height:100%;" src="{{receipe.image_url}}">
                    </div>
                </a>
            </div>
        </div>

        <div ng-show="receipes.length" style="text-align:center; width: 100%;">
            <button class="btn btn-primary" ng-click="loadMoreReceipes()">Load more receipes</button>
        </div>

        <div class="siteUsageInfo" ng-hide="receipes.length">
            <p >Just add your ingredients and Cooking Recommendation instantly finds matching recipes from the most
                popular cooking websites!(To be implemented)</p>

            <p >To get started, choose your ingredients from the categories on the left.</p>
            <p >Matching recipes that you can make will automatically appear and update.</p>

        </div>
    </div>
</div>



<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>