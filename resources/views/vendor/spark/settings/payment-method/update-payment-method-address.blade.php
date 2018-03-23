<!-- Address -->
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 m-t-5">
        <div class="form-group-custom" :class="{'has-error': form.errors.has('name')}">
            <input type="text" v-model="form.address" required="required"/>
            <label class="control-label">Address</label><i class="bar"></i>
        </div>
        <span class="help-block" v-show="form.errors.has('address')">
            @{{ form.errors.get('address') }}
        </span>
    </div>
</div>

<!-- Address Line 2 -->
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 m-t-5">
        <div class="form-group-custom" :class="{'has-error': form.errors.has('address_line_2')}">
            <input type="text" v-model="form.address" required="required"/>
            <label class="control-label">Address Line 2</label><i class="bar"></i>
        </div>
        <span class="help-block" v-show="form.errors.has('address_line_2')">
            @{{ form.errors.get('address_line_2') }}
        </span>
    </div>
</div>

<!-- City -->
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 m-t-5">
        <div class="form-group-custom" :class="{'has-error': form.errors.has('city')}">
            <input type="text" v-model="form.city" required="required"/>
            <label class="control-label">City</label><i class="bar"></i>
        </div>
        <span class="help-block" v-show="form.errors.has('city')">
            @{{ form.errors.get('city') }}
        </span>
    </div>
</div>

<!-- State & ZIP Code -->
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 m-t-5">
        <div class="form-group-custom" :class="{'has-error': form.errors.has('state')}">
            <div class="row">
                <!-- State -->
                <div class="col-sm-6">
                    <input type="text" v-model="form.state" placeholder="State">
                    <label class="control-label" style="padding-left: 17px;">State & ZIP / Postal Code</label><i class="bar"></i>
                    <span class="help-block" v-show="form.errors.has('state')">
                        @{{ form.errors.get('state') }}
                    </span>
                </div>
                <!-- Zip Code -->
                <div class="col-sm-6">
                    <input type="text" v-model="form.zip" placeholder="Postal Code" required="required"/>
                    <label class="control-label"></label><i class="bar"></i>
                    <span class="help-block" v-show="form.errors.has('zip')">
                        @{{ form.errors.get('zip') }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Country -->
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 m-t-5">
        <div class="form-group-custom" :class="{'has-error': form.errors.has('country')}">
            <select v-model="form.country">
                @foreach (app(Laravel\Spark\Repositories\Geography\CountryRepository::class)->all() as $key => $country)
                    <option value="{{ $key }}">{{ $country }}</option>
                @endforeach
            </select>
            <label class="control-label">Country</label><i class="bar"></i>
            <span class="help-block" v-show="form.errors.has('city')">
                @{{ form.errors.get('city') }}
            </span>
        </div>
    </div>
</div>