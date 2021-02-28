<div class="modal fade" id="mealOrderEditModal" tabindex="-1" role="dialog" aria-labelledby="mealOrderEditModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mealOrderEditModal">{{ __('Edit Meal Order') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="meal-order-edit-form" method="POST"
                      action="{{ route('meals.register.order', ['registrationCode' => $registrationCode, 'accessToken' => $accessToken]) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="bread_type" class="col-md-4 col-form-label text-md-right">{{ __('Bread Type') }}</label>

                        <div class="col-md-6">

                            <select class="form-control selectpicker" id="bread_type" name="bread_type" form="meal-order-edit-form" required>

                                <option value="" disabled> Select an option</option>
                                @foreach ($breadTypes as $breadType)
                                    <option value="{{ $breadType->id }}"
                                        @if ($breadType->id === ($mealOrder ? $mealOrder->breadType->id : old('bread_type')))
                                        selected="selected"
                                        @endif
                                    >{{ $breadType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="bread_size" class="col-md-4 col-form-label text-md-right">{{ __('Bread Size') }}</label>

                        <div class="col-md-6">
                            <select class="form-control selectpicker" id="bread_size" name="bread_size" form="meal-order-edit-form" required>

                                <option value="" disabled> Select an option</option>
                                @foreach ($breadSizes as $breadSize)
                                    <option value="{{ $breadSize->id }}"
                                        @if ($breadSize->id === ($mealOrder ? $mealOrder->breadType->id : old('bread_size')))
                                        selected="selected"
                                        @endif
                                    >{{ $breadSize->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="taste" class="col-md-4 col-form-label text-md-right">{{ __('Taste') }}</label>

                        <div class="col-md-6">
                            <select class="form-control selectpicker" id="taste" name="taste" form="meal-order-edit-form" required>

                                <option value="" disabled> Select an option</option>
                                @foreach ($tastes as $taste)
                                    <option value="{{ $taste->id }}"
                                        @if ($taste->id === ($mealOrder ? $mealOrder->taste->id : old('taste')))
                                        selected="selected"
                                        @endif
                                    >{{ $taste->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="extra" class="col-md-4 col-form-label text-md-right">{{ __('Extra') }}</label>

                        <div class="col-md-6">
                            <select class="form-control selectpicker" id="extra" name="extra" form="meal-order-edit-form" required>

                                <option value="" disabled> Select an option</option>
                                @foreach ($extras as $extra)
                                    <option value="{{ $extra->id }}"
                                        @if ($extra->id === ($mealOrder ? $mealOrder->extra->id : old('extra')))
                                        selected="selected"
                                        @endif
                                    >{{ $extra->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="vegetable" class="col-md-4 col-form-label text-md-right">{{ __('Vegetable') }}</label>

                        <div class="col-md-6">
                            <select class="form-control selectpicker" id="vegetable" name="vegetable" form="meal-order-edit-form" required>

                                <option value="" disabled> Select an option</option>
                                @foreach ($vegetables as $vegetable)
                                    <option value="{{ $vegetable->id }}"
                                        @if ($vegetable->id === ($mealOrder ? $mealOrder->vegetable->id : old('vegetable')))
                                        selected="selected"
                                        @endif
                                    >{{ $vegetable->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sauce" class="col-md-4 col-form-label text-md-right">{{ __('Sauce') }}</label>

                        <div class="col-md-6">
                            <select class="form-control selectpicker" id="sauce" name="sauce" form="meal-order-edit-form" required>

                                <option value="" disabled> Select an option</option>
                                @foreach ($sauces as $sauce)
                                    <option value="{{ $sauce->id }}"
                                        @if ($sauce->id === ($mealOrder ? $mealOrder->sauce->id : old('sauce')))
                                        selected="selected"
                                        @endif
                                    >{{ $sauce->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="oven_baked" class="col-md-4 col-form-label text-md-right">{{ __('Oven Baked') }}</label>

                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" form="meal-order-edit-form"
                                       name="oven_baked" id="oven_baked" {{ ($mealOrder ? $mealOrder->oven_baked : old('oven_baked')) ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Confirm') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>