<div role="tabpanel" class="tab-pane" id="tab41" aria-expanded="true" aria-labelledby="base-tab41">
    <div class="card-body">  
        <div class="form-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="projectinput1">{{ __('admin/sidebar.product_price') }}
                        </label>
                        <input type="number" id="price"
                            class="form-control"
                            placeholder="  "
                            value="{{old('price')}}"
                            name="price">
                        @error("price")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="projectinput1"> {{ __('admin/sidebar.special_product_price') }}
                        </label>
                        <input type="number"
                            class="form-control"
                            placeholder="  "
                            value="{{old('special_price')}}"
                            name="special_price">
                        @error("special_price")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="projectinput1">{{ __('admin/sidebar.type_price') }}
                        </label>
                        <select name="special_price_type" class="select2 form-control">
                            <optgroup label="من فضلك أختر النوع ">
                                <option value="percent">precent</option>
                                <option value="fixed">fixed</option>
                            </optgroup>
                        </select>
                        @error('special_price_type')
                        <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="projectinput1"> {{ __('admin/sidebar.date_strat_price') }}
                        </label>

                        <input type="date" id="price"
                            class="form-control"
                            placeholder="  "
                            value="{{old('special_price_start')}}"
                            name="special_price_start">

                        @error('special_price_start')
                        <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="projectinput1"> {{ __('admin/sidebar.date_end_price') }}
                        </label>
                        <input type="date" id="price"
                            class="form-control"
                            placeholder="  "
                            value="{{old('special_price_end')}}"
                            name="special_price_end">

                        @error('special_price_end')
                        <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane active" id="tab42" aria-labelledby="base-tab42">
    <div class="card-body">
        <div class="form-body">
            <h4 class="form-section"><i class="ft-home"></i> {{ __('admin/sidebar.Warehouse_management') }}   </h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="projectinput1"> {{ __('admin/sidebar.product_code') }}
                        </label>
                        <input type="text" id="sku"
                            class="form-control"
                            placeholder="  "
                            value="{{old('sku')}}"
                            name="sku">
                        @error("sku")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="projectinput1">{{ __('admin/sidebar.manage_stock') }}
                        </label>
                        <select name="manage_stock" class="select2 form-control" id="manageStock">
                            <optgroup label="من فضلك أختر النوع ">
                                <option value="1">{{ __('admin/sidebar.Tracking_Enabled') }}</option>
                                <option value="0" selected>{{ __('admin/sidebar.not_Tracking_Enabled') }}</option>
                            </optgroup>
                        </select>
                        @error('manage_stock')
                        <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
            <!-- QTY  -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="projectinput1">{{ __('admin/sidebar.product_status') }}
                        </label>
                        <select name="in_stock" class="select2 form-control" >
                            <optgroup label="من فضلك أختر  ">
                                <option value="1">{{ __('admin/sidebar.available') }}</option>
                                <option value="0">{{ __('admin/sidebar.not_available') }} </option>
                            </optgroup>
                        </select>
                        @error('in_stock')
                        <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6" style="display:none"  id="qtyDiv">
                    <div class="form-group">
                        <label for="projectinput1">{{ __('admin/sidebar.sku') }}
                        </label>
                        <input type="text" id="sku"
                            class="form-control"
                            placeholder="  "
                            value="{{old('qty')}}"
                            name="qty">
                        @error("qty")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>