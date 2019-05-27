$(document).ready(function () {

    $("#tags").tokenfield({
        autocomplete: {
            source: [
                'Science', 'Movies', 'Arts',
                'Games', 'Music', 'Education',
                'Stories', 'News'
            ],
            delay: 100
        },
        showAutocompleteOnFocus: true
    });
});