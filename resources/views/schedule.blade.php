@extends('layouts.app')

@section('content')
   
                           <div class="d-flex flex-column font-weight-normal">
                           <h4>Расписание</h4>
                            <table class="table-responsive-sm text-dark">
                                <thead class="text-dark">
                                <tr>
                                    <th scope="col" class="font-weight-normal">№</th>
                                    <th scope="col" class="font-weight-normal">Наименование</th>
                                    <th scope="col" class="font-weight-normal">Статус</th>
                                    <th scope="col" class="font-weight-normal">Тип участника</th>
                                </tr>
                                </thead>
                                <tbody id="competitions_table">

                                @foreach($competitions as $key =>$competition)
                                    <tr>
                                        <th scope="row" class="font-weight-normal">{{ ++$key }}</th>
                                        <td class="font-weight-normal">{{ $competition->name }}</td>
                                        <td>
                                            @if($competition->status()['slug']=='not_hold')
                                                {{ $competition->status()['label']}}
                                            @else
                                                {{$competition->status()['label'].': c '.$competition->holdings()->latest()->first()->start_date.' по '.$competition->holdings()->latest()->first()->end_date}}
                                            @endif
                                        </td>
                                        <td>{{ App\Models\User::types_label[$competition->user_type] }}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                   </div>
                    <script>
                        function filter_competitions() {
                            // Declare variables
                            var input, filter, table, tr, td, i, txtValue, show;
                            input = document.getElementById("competitions_search");
                            filter = input.value.toUpperCase();
                            table = document.getElementById("competitions_table");
                            tr = table.getElementsByTagName("tr");
                            show = false;
                            // Loop through all table rows, and hide those who don't match the search query
                            for (i = 0; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td");
                                for (j = 0; j < td.length; j++) {
                                    if (td[j]) {
                                        txtValue = td[j].textContent + td[j].innerText;
                                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            show = true;
                                        }
                                    }
                                }
                                if (show) tr[i].style.display = "";
                                else tr[i].style.display = "none";
                                show = false;
                            }


                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
