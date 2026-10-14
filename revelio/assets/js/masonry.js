document.addEventListener('DOMContentLoaded', function () {
    const masonryGrid = document.querySelector('.gallery-masonry');
    if (masonryGrid) {
        const msnry = new Masonry(masonryGrid, {
            itemSelector: '.masonry-item',
            columnWidth: '.masonry-item',
            percentPosition: true,
            gutter: 10
        });

        imagesLoaded(masonryGrid, function () {
            msnry.layout();
        });
    }
});
