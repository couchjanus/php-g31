<breadcrumb-component title="Contacy Us" page_title="Contact"></breadcrumb-component>


    <contact-component contacts=contacts></contact-component>

    <divider-component></divider-component>

    <section class="container py-5">

        <?php if (isset($messages)):?>

            <h2>How customers reviewed this storw.</h2>
            <p>Based on <?php echo count($messages);?> customers.</p>

            <div>

            <?php foreach ($messages as $row):?>
                <h3><?=$row->name?>&nbsp;<?=$row->surname?></h3>
                <p>><?=$row->created_at?></p>
                <p>><?=$row->message?></p>
            <?php endforeach?>
            </div>

        <?php endif?>

    </section>

    <script src="/js/contacts.js" defer></script>