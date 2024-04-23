<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Photo Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $photo
 * @property string $description
 * @property \Cake\I18n\DateTime $date_upload
 * @property int $album_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Album $album
 * @property \App\Model\Entity\Comment[] $comments
 * @property \App\Model\Entity\Like[] $likes
 */
class Photo extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'user_id' => true,
        'title' => true,
        'photo' => true,
        'description' => true,
        'date_upload' => true,
        'album_id' => true,
        'user' => true,
        'album' => true,
        'comments' => true,
        'likes' => true,
    ];
}
