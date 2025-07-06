<style>
    .disabled {
        background-color: #afafaf
    }
</style>


<div class="pagination">
    <a href="/blog?page=<?php echo $data['current_page'] - 1 ?>" class="<?php echo $data['current_page'] > 1 ? 'pagination-btn' : 'disabled' ?>" aria-label="<?php echo __('Previous page') ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
    </a>

    <?php
    for ($i = $data['current_page'] - 1; $data['pages'] >= $i; $i++) {
        if ($i === 0) {
            continue;
        }

        $startIndexPaginate = $data['current_page'] + 3;

        if ($i > $startIndexPaginate) {
            break;
        }
    ?>
        <a href="/blog?page=<?php echo $i ?>" class="pagination-btn <?php echo $data['current_page'] === $i ? 'active' : null ?> "><?php echo $i ?> </a>
    <?php } ?>

    <a href="/blog?page=<?php echo $data['current_page'] + 1 ?>" class="<?php echo $data['current_page'] < $data['pages'] ? 'pagination-btn' : 'disabled' ?>" aria-label="<?php echo __('Next page') ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="9 18 15 12 9 6"></polyline>
        </svg>
    </a>
</div>


<script>
    document.querySelectorAll('.disabled').forEach(function(element) {
        element.addEventListener('click', e => {
            e.preventDefault();
        })
    })
</script>
