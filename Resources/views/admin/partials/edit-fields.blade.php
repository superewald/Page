<div class="box-body">
    <div class="box-group" id="accordion">
        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
        <div class="panel box box-primary">
            <div class="box-header">
                <h4 class="box-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne-{{$lang}}">
                        Content
                    </a>
                </h4>
            </div>
            <div style="height: 0px;" id="collapseOne-{{$lang}}" class="panel-collapse collapse">
                <div class="box-body">
                    <div class='form-group{{ $errors->has("{$lang}[title]") ? ' has-error' : '' }}'>
                        {!! Form::label("{$lang}[title]", trans('page::pages.form.title')) !!}
                        {!! Form::text("{$lang}[title]", Input::old("{$lang}[title]", $page->translate($lang)->title), ['class' => "form-control", 'placeholder' => trans('page::pages.form.title')]) !!}
                        {!! $errors->first("{$lang}[title]", '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class='box-body pad'>
                        <textarea class="ckeditor" name="{{$lang}}[body]" rows="10" cols="80">
                            {!! $page->translate($lang)->body !!}
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel box box-primary">
            <div class="box-header">
                <h4 class="box-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo-{{$lang}}">
                        Meta data
                    </a>
                </h4>
            </div>
            <div style="height: 0px;" id="collapseTwo-{{$lang}}" class="panel-collapse collapse">
                <div class="box-body">
                    <div class='form-group{{ $errors->has("{$lang}[meta_title]") ? ' has-error' : '' }}'>
                        {!! Form::label("{$lang}[meta_title]", trans('page::pages.form.meta_title')) !!}
                        {!! Form::text("{$lang}[meta_title]", Input::old("{$lang}[meta_title]", $page->translate($lang)->meta_title), ['class' => "form-control", 'placeholder' => trans('page::pages.form.meta_title')]) !!}
                        {!! $errors->first("{$lang}[meta_title]", '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class='form-group{{ $errors->has("{$lang}[meta_description]") ? ' has-error' : '' }}'>
                        {!! Form::label("{$lang}[meta_description]", trans('page::pages.form.meta_description')) !!}
                        <textarea class="form-control" name="{{$lang}}[meta_description]" rows="10" cols="80">{{ $page->translate($lang)->meta_description }}</textarea>
                        {!! $errors->first("{$lang}[meta_description]", '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="panel box box-primary">
            <div class="box-header">
                <h4 class="box-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFacebook-{{$lang}}">
                        Facebook data
                    </a>
                </h4>
            </div>
            <div style="height: 0px;" id="collapseFacebook-{{$lang}}" class="panel-collapse collapse">
                <div class="box-body">
                    <div class='form-group{{ $errors->has("{$lang}[og_title]") ? ' has-error' : '' }}'>
                        {!! Form::label("{$lang}[og_title]", trans('page::pages.form.og_title')) !!}
                        {!! Form::text("{$lang}[og_title]", Input::old("{$lang}[og_title]", $page->translate($lang)->og_title), ['class' => "form-control", 'placeholder' => trans('page::pages.form.og_title')]) !!}
                        {!! $errors->first("{$lang}[og_title]", '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class='form-group{{ $errors->has("{$lang}[og_description]") ? ' has-error' : '' }}'>
                        {!! Form::label("{$lang}[og_description]", trans('page::pages.form.og_description')) !!}
                        <textarea class="form-control" name="{{$lang}}[og_description]" rows="10" cols="80">{{ $page->translate($lang)->og_description }}</textarea>
                        {!! $errors->first("{$lang}[og_description]", '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group{{ $errors->has("{$lang}[og_type]") ? ' has-error' : '' }}">
                        <label>{{ trans('page::pages.form.og_type') }}</label>
                        <select class="form-control">
                            <option value="website" {{ $page->translate($lang)->og_type == 'website' ? 'selected' : ''}}>
                                {{ trans('page::pages.facebook-types.website') }}
                            </option>
                            <option value="product" {{ $page->translate($lang)->og_type == 'product' ? 'selected' : ''}}>
                                {{ trans('page::pages.facebook-types.product') }}
                            </option>
                            <option value="article" {{ $page->translate($lang)->og_type == 'product' ? 'selected' : ''}}>
                                {{ trans('page::pages.facebook-types.article') }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>