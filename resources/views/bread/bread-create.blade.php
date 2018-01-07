@extends('Ripple::layouts.app')
@section('page-content')
<div class="page-header" style="margin: 0px;border-bottom: 1px solid gray;">
    <h1  style="margin: 0px;">Create BREAD/CRUD for <small></small></h1>
</div>
{{-- Page Content --}}
<div class="content"  >
    <br>
    <br>
    <form action="" method="post">
        {!! csrf_field() !!}
        <input type="hidden" name="create-bread"  value="{!! $table !!}">
        <div class="panel panel-primary panel-bordered">

            <div class="panel-heading">
                <h3 class="panel-title">"{!! $table !!}" BREAD info</h3>
            </div>

            <div class="panel-body">
                <div class="row clearfix">
                    <input class="form-control" readonly="" name="table" placeholder="Name" value="{!! $table !!}" type="hidden">
                </div>
                <div class="row clearfix">
                    <div class="col-md-6 form-group">
                        <label for="email">Display Name (Singular)</label>
                        <input class="form-control" name="display_singular" id="display_name_singular" placeholder="Display Name (Singular)" value="{!! $tableDetails->getName() !!}" type="text">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="email">Display Name (Plural)</label>
                        <input class="form-control" name="display_plural" id="display_name_plural" placeholder="Display Name (Plural)" value="{!! $tableDetails->getName() !!}" type="text">
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-6 form-group">
                        <label for="email">URL Slug (must be unique)</label>
                        <input class="form-control" name="slug" placeholder="URL slug (ex. posts)" value="{!! $tableDetails->getName() !!}" type="text">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="email">Icon (optional) Use a <a href="//fontawesome.io/icons/" target="_blank">Font Awesome Class</a></label>
                        <input class="form-control" name="icon" placeholder="Icon to use for this Table" value="" type="text">
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-6 form-group">
                        <label for="email">Model Name</label>
                        <span class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="" data-original-title="ex. \App\User, if left empty will try and use the table name"></span>
                        <input class="form-control" name="model" placeholder="Model Class Name" value="App\TestingTable" type="text">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="email">Controller Name</label>
                        <span class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="" data-original-title="ex. PageController, if left empty will use the BREAD Controller"></span>
                        <input class="form-control" name="controller" placeholder="Controller Name" value="" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <label for="description">Bread Rows:</label>
                    <div class="panel panel-primary panel-bordered">
                        <div class="panel-body">
                            <div class="row clearfix">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="">Column</th>
                                                <th class="">Type</th>
                                                <th class="">Null</th>
                                                <th class="text-center">Required</th>
                                                <th class="text-center">Browse</th>
                                                <th class="text-center">Read</th>
                                                <th class="text-center">Edit</th>
                                                <th class="text-center">Add</th>
                                                <th class="text-center">Delete</th>
                                                <th class="text-center" style="width: 150px;">Input Type</th>
                                                <th class="text-center" style="width: 200px;">Display Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tableDetails->getColumns() as $column)
                                            <tr>
                                                <td class="">
                                                    {!! $column->getName() !!}
                                                    <input type="hidden" value="{!! $column->getName() !!}" name="bread[{!! $loop->index !!}][column]">
                                                    @if($column->getAutoincrement())
                                                    <span class="text-success">(Autoincrement)</span>
                                                    @endif
                                                </td>
                                                <td class="">
                                                    <input type="hidden" value="{!! $column->getType() !!}" name="bread[{!! $loop->index !!}][data_type]">
                                                    {!! $column->getType() !!}
                                                </td>
                                                <td>
                                                    @if($column->getNotnull())
                                                    <span class="text-danger">Yes</span>
                                                    @else
                                                    <span class="text-primary">No</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if($column->getNotnull())
                                                    <input name="bread[{!! $loop->index !!}][required]" value="0" type="checkbox" checked>
                                                    @else
                                                    <input name="bread[{!! $loop->index !!}][required]" value="1" type="checkbox">
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <input name="bread[{!! $loop->index !!}][browse]" value="1" type="checkbox" checked>
                                                </td>
                                                <td class="text-center">
                                                    <input name="bread[{!! $loop->index !!}][read]" value="1" type="checkbox" checked>
                                                </td>
                                                <td class="text-center">
                                                    <input name="bread[{!! $loop->index !!}][edit]" value="1" type="checkbox" checked>
                                                </td>
                                                <td class="text-center">
                                                    <input name="bread[{!! $loop->index !!}][add]" value="1" type="checkbox" checked>
                                                </td>
                                                <td class="text-center">
                                                    <input name="bread[{!! $loop->index !!}][delete]" value="1" type="checkbox" checked>
                                                </td>
                                                <td class="text-center">
                                                    <select name="bread[{!! $loop->index !!}][type]" name="" id="" class="form-control input-sm">
                                                        <option value="checkbox">
                                                            Checkbox
                                                        </option>
                                                        <option value="date">
                                                            Date
                                                        </option>
                                                        <option value="file">
                                                            File
                                                        </option>
                                                        <option value="image">
                                                            Image
                                                        </option>
                                                        <option value="multiple_images">
                                                            Multiple Images
                                                        </option>
                                                        <option value="number">
                                                            Number
                                                        </option>
                                                        <option value="password">
                                                            Password
                                                        </option>
                                                        <option value="radio_btn">
                                                            Radio Button
                                                        </option>
                                                        <option value="rich_text_box">
                                                            Rich Text Box
                                                        </option>
                                                        <option value="select_dropdown">
                                                            Select Dropdown
                                                        </option>
                                                        <option value="select_multiple">
                                                            Select Multiple
                                                        </option>
                                                        <option value="text" selected="">
                                                            Text
                                                        </option>
                                                        <option value="text_area">
                                                            Text Area
                                                        </option>
                                                        <option value="timestamp">
                                                            Timestamp
                                                        </option>
                                                        <option value="hidden">
                                                            Hidden
                                                        </option>
                                                        <option value="code_editor">
                                                            Code Editor
                                                        </option>
                                                    </select>
                                                </td>
                                                <td class="text-center">
                                                    <input name="bread[{!! $loop->index !!}][display_name]" type="text" class="form-control input-sm" value="{!! ucwords(str_replace('-', ' ', preg_replace('/[^a-zA-Z0-9\. -]/', ' ', $column->getName()))); !!}" style="width:200px;margin: auto">
                                                    <input type="hidden" value="{!! date('Y-m-d h:i:s') !!}" name="bread[{!! $loop->index !!}][created_at]">
                                                    <input type="hidden" value="{!! date('Y-m-d h:i:s') !!}" name="bread[{!! $loop->index !!}][updated_at]">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- .panel-body -->
                    </div>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary btn-sm">Save BREAD</button>
                </div>
            </div><!-- .panel-body -->
        </div>

    </form>

</div>
{{-- END Page Content --}}
@stop
@push('page-script')
<script type="text/javascript">
    let Bread = angular.module('createTableBread', []);
    Bread.controller('CreateNewBread', ['$scope', function ($scope) {
            $scope.columnsInit = function (columns) {
                $scope.columns = JSON.parse(columns);
            };
        }]);
</script>
@endpush