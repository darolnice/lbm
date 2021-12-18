<?php
//use Lbm\Functions\Functions;
//use Lbm\Partials\Partials;
$title = "Shop list";
?>
<?php include('partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/shoplist.css">

<body>
    <section class="container">
        <h4 class="text-left mt-2">Shop List</h4>

        <form class="form-group sshop__" method="get">
            <input id="shop_search__" class="form-control" type="search" name="Search" placeholder="Search">
            <div class="res_div" style="display:none;"></div>
        </form>

        <div class="shoplist_div">
            <div class="shoplist_i">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Alias autem ea error facere laborum nam nulla quae quo voluptatibus.
                    Doloribus eos fugiat fugit magni sunt voluptates.
                    Accusantium animi at eum expedita facilis, ipsum maiores nam nostrum
                    numquam odit porro provident repellat reprehenderit,
                    repudiandae similique soluta sunt voluptatem. Aliquid, repellat, sint.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Alias autem ea error facere laborum nam nulla quae quo voluptatibus.
                    Doloribus eos fugiat fugit magni sunt voluptates.
                    Accusantium animi at eum expedita facilis, ipsum maiores nam nostrum
                    numquam odit porro provident repellat reprehenderit,
                    repudiandae similique soluta sunt voluptatem. Aliquid, repellat, sint.
                </p>
            </div>

            <div class="shpList">
                <div class="custList">
                    <b>Sort by</b>
                    <div id="cust_sort_div" class="mb-4 mt-1">
                        <img src="<?= S_ASSETS ?>images/svg/sort_black_24dp.svg" alt="">
                        <form method="post" style="margin-top: -25px; margin-left: 10px;">
                            <button type="submit" class="ml-3" name="cust_country" value="country" id="cust_">Country</button>
                            <button type="submit" class="ml-3" name="cust_city" value="city" id="cust_">City</button>
                            <button type="submit" class="ml-3" name="cust_Name" value="username" id="cust_">Name</button>
                            <button type="submit" class="ml-3" name="cust_gender" value="gender" id="cust_">Activity</button>
                            <button type="submit" class="ml-3" name="cust_plan" value="plan" id="cust_">Note</button>
                        </form>
                    </div>

                    <div class="allcustlist">
                        <ul>
                            <?php for($li=0; $li<count($this->getShoplist()); $li++): ?>
                                <li data-spn="<?= $this->getShoplist()[$li]['shop_name']?>"
                                    style="cursor: pointer"
                                    class="list-group-item shp__list">
                                    <span>
                                        <b>Name : </b><a><?= $this->getShoplist()[$li]['shop_name']?></a>
                                        <b>Country : </b><a><?= $this->getShoplist()[$li]['country']?></a>
                                        <b>Activity : </b><a><?= $this->getShoplist()[$li]['activity']?></a>
                                    </span>
                                </li>
                            <?php endfor;?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="CountryList">
                <div class="custList">
                    <p style="font-weight: 600; margin-bottom: 55px!important;">Country List</p>
                    <div class="allcustlist">
                        <ul>
                            <?php $country = []?>
                            <?php foreach($this->getShoplist() as $value): ?>
                                <?php array_push($country, $value['country']);?>
                            <?php endforeach;?>

                            <?php foreach(array_unique($country) as $item): ?>
                                <li class="list-group-item">
                                        <span>
                                            <b>Country : </b><a><?= $item?></a>
                                        </span>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="ActivityList">
                <div class="custList">
                    <p style="font-weight: 600; margin-bottom: 55px!important;">Activity List</p>
                    <div class="allcustlist">
                        <ul>
                            <?php $country = []?>
                            <?php foreach($this->getShoplist() as $value): ?>
                                <?php array_push($country, $value['activity']);?>
                            <?php endforeach;?>

                            <?php foreach(array_unique($country) as $item): ?>
                                <li class="list-group-item">
                                        <span>
                                            <b>Activity : </b><a><?= $item?></a>
                                        </span>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- scripts start -->
    <script src="<?= S_ASSETS?>js/Index.js"></script>
    <script src="<?= S_ASSETS?>js/shoplist.js"></script>
    <script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
    <!-- scripts end -->
</body>