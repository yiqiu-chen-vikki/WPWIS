@extends('layouts.master')
@section('content')
<section class="section">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
              <div class="card-stats">
                  <div class="card-stats-title">Today Purchase Statistics - 
                  </div>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">{{ $purchasePending }}</div>
                      <div class="card-stats-item-label">Pending</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">{{$purchaseApprovaled}}</div>
                      <div class="card-stats-item-label">Approvaled</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">{{$purchaseTotal}}</div>
                      <div class="card-stats-item-label">Total</div>
                    </div>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Purchase today</h4>
                  </div>
                  <div class="card-body">
                   {{$purchaseCount}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
              <div class="card-stats">
                  <div class="card-stats-title"> Production Statistics - 
                  </div>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">{{ $productionPending}}</div>
                      <div class="card-stats-item-label">Assigned</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">{{$productionApprovaled}}</div>
                      <div class="card-stats-item-label">Completed</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">{{$productionCount}}</div>
                      <div class="card-stats-item-label">Total</div>
                    </div>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Production</h4>
                  </div>
                  <div class="card-body">
                   {{$productionCount}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
              
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-dollar-sign"></i>
                  
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Sales today</h4>
                  </div>
                  <div class="card-body">
                   {{$invoiceCount}}
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                
                  <div class="card-header">
                    <h4>Total Product</h4>
                  </div>
                  <div class="card-body">
                   {{$productCount}}
                  </div>
              
              </div>
          
            </div>
          
           
          </div>
          <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Product</h4>
                        <div class="card-header-action">
                            <a href="{{ route('product.report') }}" class="btn btn-danger">View Product Stock <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Stock</th>
                                </tr>
                                @foreach ( $allProduct as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{$item->quantity}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4> Invoices</h4>
                        <div class="card-header-action">
                            <a href="{{ route('invoice.all') }}" class="btn btn-danger">View all Invoices <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>Invoice ID</th>
                                    <th>Customer Name</th>
                                    <th>Status</th>
                                </tr>
                                @foreach ($allInvoices as $item)
                                    <tr>
                                        <td>{{ $item->invoice_id }}</td>
                                        <td>{{ $item['customer']['name']  }}</td>
                                        <td>{{$item->paid_status }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Purchase</h4>
                        <div class="card-header-action">
                            <a href="{{ route('purchase.index') }}" class="btn btn-danger">View Purchase <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>Purcahse No.</th>
                                    <th>Product Name</th>
                                    <th>Date</th>
                                </tr>
                                @foreach ( $allPurchase as $item)
                                    <tr>
                                        <td>{{ $item->purchase_no }}</td>
                                        <td>{{ $item['material']['name'] }}</td>
                                        <td>{{$item->date}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4> Material</h4>
                        <div class="card-header-action">
                            <a href="{{ route('material.index') }}" class="btn btn-danger">View all Material<i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>Material ID</th>
                                    <th>Material Name</th>
                                    <th>quantity</th>
                                </tr>
                                @foreach ($allMaterial as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{$item->quantity}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
@endsection 