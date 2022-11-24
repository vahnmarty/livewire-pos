<script>
    Livewire.on('backtotop', param => {
        window.scrollTo(0, 0);
    });

    Livewire.on('alert', param => {
        Swal.fire(
            param['title'] ?? '',
            param['message'],
            param['type']
        )
    });

    Livewire.on('openWindow', param => {
        window.open(param);
    })
</script>