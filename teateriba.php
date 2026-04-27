<?php


add_action('admin_menu', 'teateriba_lisa_menuu');

function teateriba_lisa_menuu() {
    add_menu_page(
        'Teateriba seaded',
        '[Sinu Nimi] teateriba', 
        'manage_options',
        'teateriba-seaded',
        'teateriba_seadete_leht',
        'dashicons-megaphone'
    );
}

function teateriba_seadete_leht() {
    if (isset($_POST['save_teateriba'])) {
        update_option('tr_tekst', sanitize_text_field($_POST['tr_tekst']));
        update_option('tr_taust', sanitize_hex_color($_POST['tr_taust']));
        update_option('tr_tekstivarv', sanitize_hex_color($_POST['tr_tekstivarv']));
        update_option('tr_ainult_avaleht', isset($_POST['tr_ainult_avaleht']) ? 1 : 0);
        echo '<div class="updated"><p>Seaded salvestatud!</p></div>';
    }

    $tekst = get_option('tr_tekst', 'Tere tulemast!');
    $taust = get_option('tr_taust', '#ff0000');
    $varv = get_option('tr_tekstivarv', '#ffffff');
    $ainult_avaleht = get_option('tr_ainult_avaleht', 0);

    ?>
    <div class="wrap">
        <h1>Teateriba seaded</h1>
        <form method="post">
            <table class="form-table">
                <tr>
                    <th>Tekst:</th>
                    <td><input type="text" name="tr_tekst" value="<?php echo esc_attr($tekst); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th>Taustavärv:</th>
                    <td><input type="color" name="tr_taust" value="<?php echo esc_attr($taust); ?>"></td>
                </tr>
                <tr>
                    <th>Teksti värv:</th>
                    <td><input type="color" name="tr_tekstivarv" value="<?php echo esc_attr($varv); ?>"></td>
                </tr>
                <tr>
                    <th>Kuva ainult avalehel:</th>
                    <td><input type="checkbox" name="tr_ainult_avaleht" value="1" <?php checked(1, $ainult_avaleht); ?>></td>
                </tr>
            </table>
            <p class="submit">
                <input type="submit" name="save_teateriba" class="button-primary" value="Salvesta seaded">
            </p>
        </form>
    </div>
    <?php
}

add_action('wp_body_open', 'teateriba_kuva_riba');

function teateriba_kuva_riba() {
    $ainult_avaleht = get_option('tr_ainult_avaleht', 0);
    
    if ($ainult_avaleht && !is_front_page()) {
        return;
    }

    $tekst = get_option('tr_tekst');
    if (empty($tekst)) return;

    $taust = get_option('tr_taust', '#ff0000');
    $varv = get_option('tr_tekstivarv', '#ffffff');

    echo "
    <div id='teateriba-it25' style='background: $taust; color: $varv; text-align: center; padding: 15px; width: 100%; position: relative; z-index: 9999; font-weight: bold;'>
        $tekst
        <button onclick=\"document.getElementById('teateriba-it25').style.display='none'\" style='position: absolute; right: 20px; top: 50%; transform: translateY(-50%); background: none; border: none; color: $varv; cursor: pointer; font-size: 20px;'>&times;</button>
    </div>
    ";
}