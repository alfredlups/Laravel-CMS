@extends('layouts.customer.app')
@section('content')
<div id="banner" class="inner-banner">
              <img src="public/customer/images/img-inner-banner.jpg" alt="Image">
              <div class="ib-overlay left-overlay"></div>
              <div class="ib-overlay right-overlay"></div>
            </div>

            <div id="main" class="main">
                <div class="container">
                    <div class="breadcrumbs">
                       <ul>
                           <li><a href="#">Home</a></li>
                           <li><a href="#">About</a></li>
                       </ul>
                    </div>

                    <div class="content">
                        <h1>About</h1>

                        <div class="wp-block-image">
                            <img src="public/customer/images/img-content-about.jpg" alt="Image" class="alignright">
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor inci did unt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exer citation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>

                        <h2>History</h2>

                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinct. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat.</p>

                        <h3>SED DUIS AUTE DOLOR</h3>

                        <ul>
                            <li>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</li>
                            <li>Nemo enim ipsam voluptatem quia lorem voluptas</li>
                            <li>Ut enim ad minima veniam quis nostrum exercitationem ullam</li>
                            <li>Quis autem vel eum iure reprehenderit qui in ea voluptate</li>
                            <li>Et harum quidem rerum facilis est et expedita distinctio</li>
                        </ul>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur utem vel eum iure reprehenderit qui in ea voluptate velit esse quam <a href="#">nihil molestiae consequatur</a>.</p>
                    </div>
                </div>
            </div><!--end main-->            
@endsection