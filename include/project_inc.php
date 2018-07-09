<article class="action">
    <a href="project.php?id=<?php echo $project["id"]; ?>">
        <img src="uploads/<?php echo $project["picture"]; ?>" alt="<?php echo $project["title"]; ?>">
        <footer class="overlay">
            <div class="info">
                <div class="tag"><?php echo number_format($project["price"], 0, ",", " "); ?> €</div>
                <?php if (is_numeric($project["grade"])) : ?>
                    <?php for ($i = 0; $i < 5; $i++) : ?>
                        <?php if ($project["grade"] > $i) : ?>
                            <i class="fa fa-star"></i>
                        <?php else: ?>
                            <i class="fa fa-star-o"></i>
                        <?php endif; ?>
                    <?php endfor; ?>
                <?php endif; ?>
                <h3><?php echo $project["title"]; ?></h3>
            </div>
            <div class="more-info">
                <div class="action-info">
                    <i class="fa fa-calendar"></i>
                    <?php echo $project["date_start"]; ?>
                </div>
                <div class="action-info">
                    <i class="fa fa-tag"></i>
                    <?php echo $project["category"]; ?>
                </div>
                <div class="action-info">
                    <i class="fa fa-users"></i>
                    <?php echo $project["nb_members"]; ?>
                </div>
            </div>
        </footer>
    </a>
</article>