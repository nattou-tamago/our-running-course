<script>
    const position = @json([$course->position->getLng(), $course->position->getLat()]);

    const courseTitle = @json($course->title);

    mapboxgl.accessToken = "{{ config('my-app.mapbox_token') }}";
    const map = new mapboxgl.Map({
    container: 'mapForShow', // container ID
    style: 'mapbox://styles/mapbox/streets-v11', // style URL
    center: position, // starting position [lng, lat]
    zoom: 8, // starting zoom
    // projection: 'globe' // display the map as a 3D globe
    });
    map.on('style.load', () => {
    map.setFog({}); // Set the default atmosphere style
    });

    new mapboxgl.Marker({ color: '#FF66FF' })
        .setLngLat(position)
        .setPopup(
            new mapboxgl.Popup({ offset: 25 })
                .setHTML(`<h5>${courseTitle}</h5>`)
        )
        .addTo(map);
</script>
