<?php
/* vim:set softtabstop=4 shiftwidth=4 expandtab: */
/**
 *
 * LICENSE: GNU General Public License, version 2 (GPLv2)
 * Copyright 2001 - 2013 Ampache.org
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License v2
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 */

$thcount = 7;
?>
<?php UI::show_box_top(T_('Similar Artists'), 'info-box'); ?>
<table class="tabledata" cellpadding="0" cellspacing="0">
    <tr class="th-top">
    <?php if (AmpConfig::get('directplay')) { ++$thcount; ?>
        <th class="cel_directplay"><?php echo T_('Play'); ?></th>
    <?php } ?>
        <th class="cel_add"><?php echo T_('Add'); ?></th>
        <th class="cel_artist"><?php echo T_('Artist'); ?></th>
        <th class="cel_songs"><?php echo T_('Songs');  ?></th>
        <th class="cel_albums"><?php echo T_('Albums'); ?></th>
        <th class="cel_time"><?php echo T_('Time'); ?></th>
        <th class="cel_tags"><?php echo T_('Tags'); ?></th>
    <?php if (AmpConfig::get('ratings')) { ++$thcount; ?>
        <th class="cel_rating"><?php echo T_('Rating'); ?></th>
    <?php } ?>
    <?php if (AmpConfig::get('userflags')) { ++$thcount; ?>
        <th class="cel_userflag"><?php echo T_('Flag'); ?></th>
    <?php } ?>
        <th class="cel_action"> <?php echo T_('Action'); ?> </th>
    </tr>
    <?php
    // Cache the ratings we are going to use
    if (AmpConfig::get('ratings')) { Rating::build_cache('artist',$object_ids); }
    // Cache the userflags we are going to use
    if (AmpConfig::get('userflags')) { Userflag::build_cache('artist',$object_ids); }

    /* Foreach through every artist that has been passed to us */
    foreach ($object_ids as $artist_id) {
            $artist = new Artist($artist_id);
            $artist->format();
    ?>
    <tr id="artist_<?php echo $artist->id; ?>" class="<?php echo UI::flip_class(); ?>">
        <?php require AmpConfig::get('prefix') . '/templates/show_artist_row.inc.php'; ?>
    </tr>
    <?php } ?>
    <?php if (!$object_ids || !count($object_ids)) { ?>
    <tr class="<?php echo UI::flip_class(); ?>">
        <td colspan="<?php echo $thcount; ?>"><span class="nodata"><?php echo T_('No similar artist found'); ?></span></td>
    </tr>
    <?php } ?>
    <tr class="th-bottom">
    <?php if (AmpConfig::get('directplay')) { ?>
        <th class="cel_directplay"><?php echo T_('Play'); ?></th>
    <?php } ?>
        <th class="cel_add"><?php echo T_('Add'); ?></th>
        <th class="cel_artist"><?php echo T_('Artist'); ?></th>
        <th class="cel_songs"> <?php echo T_('Songs');  ?> </th>
        <th class="cel_albums"> <?php echo T_('Albums'); ?> </th>
        <th class="cel_time"> <?php echo T_('Time'); ?> </th>
        <th class="cel_tags"><?php echo T_('Tags'); ?></th>
    <?php if (AmpConfig::get('ratings')) { ?>
        <th class="cel_rating"><?php echo T_('Rating'); ?></th>
    <?php } ?>
    <?php if (AmpConfig::get('userflags')) { ?>
        <th class="cel_userflag"><?php echo T_('Flag'); ?></th>
    <?php } ?>
        <th class="cel_action"> <?php echo T_('Action'); ?> </th>
    </tr>
</table>
<?php UI::show_box_bottom(); ?>
