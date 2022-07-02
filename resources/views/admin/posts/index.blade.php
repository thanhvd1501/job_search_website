@extends('layout.master')
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                              height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                              fill="currentColor"></rect>
														<path
                                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                            fill="currentColor"></path>
													</svg>
												</span>
                            <input type="text" data-kt-customer-table-filter="search"
                                   class="form-control form-control-solid w-250px ps-15" placeholder="Search Customers">
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center py-1">
                    <a href="{{--{{ route('admin.posts.create') }}--}}" class="btn btn-sm btn-primary mb-3">Create</a>
                    <div class="input-group mb-3">
                        <label class="btn btn-secondary btn-sm" for="csv">Import CSV</label>
                        <input type="file" class="d-none" id="csv"
                               accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                   id="table-data">
                                <thead>
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class=" sorting" rowspan="1" colspan="1">#</th>
                                    <th class=" sorting" rowspan="1" colspan="1">Job Title</th>
                                    <th class=" sorting" rowspan="1" colspan="1">Location</th>
                                    <th class=" sorting" rowspan="1" colspan="1">Remote able</th>
                                    <th class=" sorting" rowspan="1" colspan="1">Is part-time</th>
                                    <th class=" sorting" rowspan="1" colspan="1">Range Salary</th>
                                    <th class=" sorting" rowspan="1" colspan="1">date range</th>
                                    <th class=" sorting" rowspan="1" colspan="1">status</th>
                                    <th class=" sorting" rowspan="1" colspan="1">is pinned</th>
                                    <th class=" sorting" rowspan="1" colspan="1">created at</th>
                                </tr>
                                </thead>
                                <tbody class="fw-bold text-gray-600">
                                <tr class="odd">
                                    <td>
                                        <a href=""
                                           class="text-gray-800 text-hover-primary mb-1">1</a>
                                    </td>
                                    <td>
                                        <a href="#" class="text-gray-600 text-hover-primary mb-1"></a>
                                    </td>
                                    <td>
                                        <a href="#" class="text-gray-600 text-hover-primary mb-1"></a>
                                    </td>
                                    <td>
                                        <a href="#" class="text-gray-600 text-hover-primary mb-1"></a>
                                    </td>
                                    <td>
                                        <a href="#" class="text-gray-600 text-hover-primary mb-1"></a>
                                    </td>
                                    <td>
                                        <a href="#" class="text-gray-600 text-hover-primary mb-1"></a>
                                    </td>
                                    <td>
                                        <a href="#" class="text-gray-600 text-hover-primary mb-1"></a>
                                    </td>
                                    <td>
                                        <a href="#" class="text-gray-600 text-hover-primary mb-1"></a>
                                    </td>
                                    <td>
                                        <a href="#" class="text-gray-600 text-hover-primary mb-1"></a>
                                    </td>
                                    <td>
                                        <a href="#" class="text-gray-600 text-hover-primary mb-1"></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            // crawl data
            $.ajax({
                url: '{{ route('api.posts') }}',
                dataType: 'json',
                data: {page: {{ request()->get('page') ?? 1 }}},
                success: function (response) {
                    response.data.data.forEach(function (each) {
                        let location = each.district + ' - ' + each.city;
                        let remotable = each.remotable ? 'x' : '';
                        let is_partime = each.is_partime ? 'x' : '';
                        let range_salary = (each.min_salary && each.max_salary) ? each.min_salary + '-' + each.max_salary : '';
                        let range_date = (each.start_date && each.end_date) ? each.start_date + '-' + each.end_date : '';
                        let is_pinned = each.is_pinned ? 'x' : '';
                        let created_at = convertDateToDateTime(each.created_at);
                        $('#table-data').append($('<tr>')
                            .append($('<td>').append(each.id))
                            .append($('<td>').append(each.job_title))
                            .append($('<td>').append(location))
                            .append($('<td>').append(remotable))
                            .append($('<td>').append(is_partime))
                            .append($('<td>').append(range_salary))
                            .append($('<td>').append(range_date))
                            .append($('<td>').append(each.status))
                            .append($('<td>').append(is_pinned))
                            .append($('<td>').append(created_at))
                        );
                    });
                    renderPagination(response.data.pagination);
                },
                error: function (response) {
                    $.toast({
                        heading: 'Import Error',
                        text: response.responseJSON.message,
                        showHideTransition: 'slide',
                        position: 'bottom-right',
                        icon: 'error'
                    })
                }
            })
            /*$(document).on('click', '#pagination > li > a', function (event) {
                event.preventDefault();
                let page = $(this).text();
                let urlParams = new URLSearchParams(window.location.search);
                urlParams.set('page', page);
                window.location.search = urlParams;
            });
            $("#csv").change(function () {
                var formData = new FormData();
                formData.append('file', $(this)[0].files[0]);
                $.ajax({
                    {{--url: '{{ route('admin.posts.import_csv') }}',--}}
            type: 'POST',
            dataType: 'json',
            enctype: 'multipart/form-data',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function () {
                $.toast({
                    heading: 'Import Success',
                    text: 'Your data have been imported',
                    showHideTransition: 'slide',
                    position: 'bottom-right',
                    icon: 'success'
                })
            },
            error: function (response) {
            }
        });
    });*/
        });
    </script>
@endpush
