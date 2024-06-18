<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/izitoast/dist/css/iziToast.min.css') }}">
    <title>@yield('title') - Penjualan Sparepart</title>
</head>

<body>
    @yield('body')


    <script src="{{ asset('vendor/jquery/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/izitoast/dist/js/iziToast.min.js') }}"></script>
    <script>
        $('#searchBarang').on('submit', function(e) {
            e.preventDefault()

            let dataForm = $(this).serialize()
            $.ajax({
                type: 'get',
                data: dataForm,
                url: '/search/barang',
                success: function(res) {
                    $('#cariBarang tbody').html(res)
                }
            })
        })

        $('#cariBarang').on('show.bs.modal', function(e) {
            $(this).find('input[name="keyword"]').val('')

            let dataForm = $(this).serialize()
            $.ajax({
                type: 'get',
                data: dataForm,
                url: '/search/barang',
                success: function(res) {
                    $('#cariBarang tbody').html(res)
                }
            })
        })

        $('#cariBarang .save').on('click', function() {
            let barang = $('#cariBarang').find('input[type="radio"]:checked').closest('tr').find('td')

            console.log(barang[1].innerHTML);

            $('#kode_barang').val(barang[1].innerHTML)
            $('#nama_barang').val(barang[2].innerHTML)
            $('#harga_satuan').val(barang[4].innerHTML)
            $('#jumlah').val('1')
            $('#jumlah').attr('data-max', (barang[7].innerHTML));
            $('#harga_total').val(barang[4].innerHTML)
            $('#stok').val(barang[7].innerHTML)

            $('#cariBarang').modal('hide')
        })

        $('#jumlah').on('input', function() {
            if (parseInt($(this).val()) > parseInt($(this).data('max'))) {
                $(this).val($(this).data('max'))
            }

            $('#harga_total').val($(this).val() * $('#harga_satuan').val())
        })
    </script>

    @if (Session::has('inputSuccess'))
        <script>
            iziToast.success({
                title: 'Success',
                message: 'Data telah berhasil disimpan',
                position: 'bottomLeft',
                drag: false,
                pauseOnHover: false,
                iconColor: '#198754',
                titleColor: '#198754',
            });
        </script>
    @endif

    @if (Session::has('updateSuccess'))
        <script>
            iziToast.success({
                title: 'Success',
                message: 'Data telah berhasil diubah',
                position: 'bottomLeft',
                drag: false,
                pauseOnHover: false,
                iconColor: '#198754',
                titleColor: '#198754',
            });
        </script>
    @endif

    @if (Session::has('deleteSuccess'))
        <script>
            iziToast.success({
                title: 'Success',
                message: 'Data telah berhasil dihapus',
                position: 'bottomLeft',
                drag: false,
                pauseOnHover: false,
                iconColor: '#198754',
                titleColor: '#198754',
            });
        </script>
    @endif
</body>

</html>
