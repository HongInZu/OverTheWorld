<section class="ih-component-search">
    <div class="container">
        <div class="ih-relative row">
            <form class="center-block" id="form-search">
                <div class="col-xs-12 col-md-6">
                    <div class="ih-form-group-icon ih-relative form-group">
                        <input type="text" class="form-control" placeholder="關鍵字">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="ih-form-group-icon ih-relative form-group">
                        <input type="text" class="ih-datepicker form-control" placeholder="入住日期">
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="ih-form-group-icon ih-relative form-group">
                        <input type="text" class="ih-datepicker form-control" placeholder="退房日期">
                        <i class="fa fa-calendar-times-o" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="ih-form-group-icon ih-relative form-group">
                        <input type="number" class="form-control" min="1" placeholder="房間數">
                        <i class="fa fa-bed" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="ih-form-group-icon ih-relative form-group">
                        <select class="ih-select form-control">
                            <option>地區</option>
                        </select>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-2">
                    <div class="ih-form-group-icon ih-relative form-group">
                        <input type="number" class="form-control" min="1" placeholder="大人">
                        <i class="fa fa-male" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2">
                    <div class="ih-form-group-icon ih-relative form-group">
                        <input type="number" class="form-control" min="0" placeholder="小孩">
                        <i class="fa fa-child" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="col-xs-12 col-md-2">
                    <div class="ih-form-group-icon ih-relative form-group">
                        <button type="submit" class="ih-theme-button-search ih-button ih-relative">
                            搜尋
                        </button>
                    </div>
                </div>
            </form>

            <button type="button" class="ih-theme-button-search-toggle ih-button" id="search-toggle" onclick="toggle(this, '#form-search')">
                <i class="fa fa-angle-up" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</section>
