<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Statistik Cards --}}
            <div class="row mt-3">
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="card bg-pattern-primary">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body text-left">
                                    <h4 class="text-white">4500</h4>
                                    <span class="text-white">Total Orders</span>
                                </div>
                                <div class="align-self-center w-circle-icon rounded-circle bg-contrast">
                                    <i class="icon-basket-loaded text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card lain sama seperti yang kamu kasih -->
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="card bg-pattern-danger">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body text-left">
                                    <h4 class="text-white">7850</h4>
                                    <span class="text-white">Total Expenses</span>
                                </div>
                                <div class="align-self-center w-circle-icon rounded-circle bg-contrast">
                                    <i class="icon-wallet text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6 col-xl-3">
          <div class="card bg-pattern-success">
            <div class="card-body">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white">87.5%</h4>
                <span class="text-white">Total Revenue</span>
              </div>
              <div class="align-self-center w-circle-icon rounded-circle bg-contrast">
                <i class="icon-pie-chart text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-3">
          <div class="card bg-pattern-warning">
            <div class="card-body">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white">8400</h4>
                <span class="text-white">New Users</span>
              </div>
              <div class="align-self-center w-circle-icon rounded-circle bg-contrast">
                <i class="icon-user text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
                <!-- dst untuk Revenue & New Users -->
            </div>

            {{-- Chart Section --}}
            <div class="row">
                <div class="col-12 col-lg-8 col-xl-8">
                    <div class="card gradient-violet">
                        <div class="card-header bg-transparent text-white border-light">
                            Product Sales
                            <div class="card-action">
                                <div class="dropdown">
                                    <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                                        <i class="icon-options text-white"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void();">Action</a>
                                        <a class="dropdown-item" href="javascript:void();">Another action</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="dashboard-chart-1"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4 col-xl-4">
                    <div class="card gradient-titanium">
                        <div class="card-header bg-transparent text-white border-light">
                            Trending Products
                        </div>
                        <div class="card-body">
                            <canvas id="dashboard-chart-2" height="335"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Recent Orders Table --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="card bg-primary">
                        <div class="card-header bg-transparent text-white border-0">
                            Recent Orders
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush table-primary">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Photo</th>
                                        <th>Product ID</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Shipping</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Iphone 5</td>
                                        <td><img src="{{ asset('assets/images/products/01.png') }}" class="product-img" alt="product img"></td>
                                        <td>#9405822</td>
                                        <td><span class="badge gradient-quepal text-white shadow">Paid</span></td>
                                        <td>$ 1250.00</td>
                                        <td>03 Aug 2017</td>
                                        <td>
                                            <div class="progress shadow" style="height: 6px;">
                                                <div class="progress-bar gradient-quepal" role="progressbar" style="width: 100%"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Tambahkan baris lain sesuai contoh -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>


            {{-- Breeze default box --}}
            {{-- <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div> --}}
