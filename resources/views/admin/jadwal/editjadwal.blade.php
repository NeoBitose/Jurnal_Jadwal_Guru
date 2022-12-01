<table id="example5" class="table-bordered">
    <form action="">
        <thead>

            <tr>
                <th>Pilih</th>
                <th>NIP</th>
                <th>Nama Guru</th>
                <th>Kode</th>
                <th>Mata Pelajaran</th>
            </tr>

        </thead>
        <tbody>

            @foreach ($getkode as $data)
                <tr>
                    <td id="radio">
                        <label>
                            <input class="with-gap" name="kode_guru" id="{{ $data->id_kode_guru }}"
                                type="checkbox" value="{{ $data->id_kode_guru }}">
                            <span>*</span>
                        </label>
                    </td>
                    <td>{{ $data->nip }}</td>
                    <td>{{ $data->nama_guru }}</td>
                    <td>{{ $data->kode_guru }}</td>
                    <td>{{ $data->nama_mapel }}</td>
                </tr>
            @endforeach
        </tbody>
    </form>
</table><br><br>
