<div class="modal fade" id="mealOrderRegisterModal" tabindex="-1" role="dialog" aria-labelledby="mealOrderRegisterModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mealOrderRegisterModal">{{ __('Register Meal Order') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="meal-order-register-form" method="POST"
                      action="{{ route('meals.register.order', ['registrationCode' => $registrationCode, 'accessToken' => $accessToken]) }}">
                    @csrf

                    <div class="form-group row">
                        <label for="bread_type" class="col-md-4 col-form-label text-md-right">{{ __('Bread Type') }}</label>

                        <div class="col-md-6">

                            <select class="form-control selectpicker" id="bread_type" name="bread_type" form="meal-order-register-form" required>

                                <option value="" disabled selected> Select an option</option>
                                @foreach ($breadTypes as $breadType)
                                    <option value="{{ $breadType->id }}">{{ $breadType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="bread_size" class="col-md-4 col-form-label text-md-right">{{ __('Bread Size') }}</label>

                        <div class="col-md-6">
                            <select class="form-control selectpicker" id="bread_size" name="bread_size" form="meal-order-register-form" required>

                                <option value="" disabled selected> Select an option</option>
                                @foreach ($breadSizes as $breadSize)
                                    <option value="{{ $breadSize->id }}">{{ $breadSize->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="taste" class="col-md-4 col-form-label text-md-right">{{ __('Taste') }}</label>

                        <div class="col-md-6">
                            <select class="form-control selectpicker" id="taste" name="taste" form="meal-order-register-form" required>

                                <option value="" disabled selected> Select an option</option>
                                @foreach ($tastes as $taste)
                                    <option value="{{ $taste->id }}">{{ $taste->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="extra" class="col-md-4 col-form-label text-md-right">{{ __('Extra') }}</label>

                        <div class="col-md-6">
                            <select class="form-control selectpicker" id="extra" name="extra" form="meal-order-register-form" required>

                                <option value="" disabled selected> Select an option</option>
                                @foreach ($extras as $extra)
                                    <option value="{{ $extra->id }}">{{ $extra->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="vegetable" class="col-md-4 col-form-label text-md-right">{{ __('Vegetable') }}</label>

                        <div class="col-md-6">
                            <select class="form-control selectpicker" id="vegetable" name="vegetable" form="meal-order-register-form" required>

                                <option value="" disabled selected> Select an option</option>
                                @foreach ($vegetables as $vegetable)
                                    <option value="{{ $vegetable->id }}">{{ $vegetable->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sauce" class="col-md-4 col-form-label text-md-right">{{ __('Sauce') }}</label>

                        <div class="col-md-6">
                            <select class="form-control selectpicker" id="sauce" name="sauce" form="meal-order-register-form" required>

                                <option value="" disabled selected> Select an option</option>
                                @foreach ($sauces as $sauce)
                                    <option value="{{ $sauce->id }}">{{ $sauce->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="oven_baked" class="col-md-4 col-form-label text-md-right">{{ __('Oven Baked') }}</label>

                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="oven_baked" id="oven_baked" {{ old('oven_baked') ? 'checked' : '' }} required>
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