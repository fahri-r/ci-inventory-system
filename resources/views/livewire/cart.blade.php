<div>
    <form class="form form-vertical" wire:submit.prevent="addToCart">
        @csrf
        <div class="form-body">
            <div class="row">
                <div class="col-12 col-md-8">
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th style="width:5%">#</th>
                                <th style="width:50%">Product</th>
                                <th style="width:15%">Quantity</th>
                                <th style="width:15%">Price</th>
                                <th style="width:15%">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><button class="btn btn-primary" wire:click.prevent="add"><i
                                            class="fas fa-plus"></i></button>
                                </td>
                                <td>
                                    <select class="form-select" wire:model="productId.0" wire:change="selectProduct(0)">
                                        <option value="">Select Product</option>
                                        @foreach ($products as $p)
                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control" type="number"
                                        max="{{ is_array($stock) ? $stock[0] : ''}}" wire:model="qty.0"
                                        wire:change="addQuantity(0)">
                                </td>
                                <td>{{ is_array($price) ? $price[0] : ''}}</td>
                                <td>{{ is_array($amount) ? $amount[0] : ''}}</td>
                            </tr>
                            {{-- Add Form --}}
                            @foreach ($inputs as $key => $value)
                            <tr>
                                <td><button class="btn btn-danger" wire:click.prevent="remove({{$key}})"><i
                                            class="fas fa-times"></i></button></td>
                                <td>
                                    <select class="form-select" wire:model="productId.{{ $value }}"
                                        wire:change="selectProduct({{ $value }})">
                                        <option value="">Select Product</option>
                                        @foreach ($products as $p)
                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control" type="number"
                                        max="{{ !empty($stock[$value]) ? $stock[$value] : ''}}"
                                        wire:model="qty.{{ $value }}" wire:change="addQuantity({{ $value }})">
                                </td>
                                <td>{{ !empty($price[$value]) ? $price[$value] : ''}}</td>
                                <td>{{ !empty($amount[$value]) ? $amount[$value] : ''}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12 col-md-4">
                    <table class="table table-lg">
                        <tbody>
                            <tr>
                                <th style="width:40%">Gross Amount</th>
                                <td style="width:60%"><input type="text" class="form-control" readonly="readonly"
                                        value="{{ !empty($amount) ? array_sum($amount) : '' }}"></td>
                            </tr>
                            <tr>
                                <th>S-Charge</th>
                                <td><input type="text" class="form-control" readonly="readonly" value=""></td>
                            </tr>
                            <tr>
                                <th>Vat</th>
                                <td><input type="text" class="form-control" readonly="readonly" value=""></td>
                            </tr>
                            <tr>
                                <th>Discount %</th>
                                <td><input type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <th>Net Amount</th>
                                <td><input type="text" class="form-control" readonly="readonly" value=""></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-12 d-flex">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>