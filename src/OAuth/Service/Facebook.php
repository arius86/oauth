<?php
/**
 * This file is part of Vegas package
 *
 * @author Slawomir Zytko <slawomir.zytko@gmail.com>
 * @copyright Amsterdam Standard Sp. Z o.o.
 * @homepage https://bitbucket.org/amsdard/vegas-phalcon
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace Vegas\Security\OAuth\Service;

use Vegas\Security\OAuth\Identity;
use Vegas\Security\OAuth\ServiceAbstract;

/**
 * Class Facebook
 *
 * @see https://developer.linkedin.com/documents/authentication
 *
 * @package Vegas\Security\OAuth\Service
 */
class Facebook extends ServiceAbstract
{
    /**
     * Name of oAuth service
     */
    const SERVICE_NAME = 'facebook';

    /**
     * Defined scopes
     *
     * If you don't think this is scary you should not be allowed on the web at all
     *
     * @link https://developers.facebook.com/docs/reference/login/
     * @link https://developers.facebook.com/tools/explorer For a list of permissions use 'Get Access Token'
     */
    // email scopes
    const SCOPE_EMAIL                         = 'email';
    // extended permissions
    const SCOPE_READ_FRIENDLIST               = 'read_friendlists';
    const SCOPE_READ_INSIGHTS                 = 'read_insights';
    const SCOPE_READ_MAILBOX                  = 'read_mailbox';
    const SCOPE_READ_PAGE_MAILBOXES           = 'read_page_mailboxes';
    const SCOPE_READ_REQUESTS                 = 'read_requests';
    const SCOPE_READ_STREAM                   = 'read_stream';
    const SCOPE_VIDEO_UPLOAD                  = 'video_upload';
    const SCOPE_XMPP_LOGIN                    = 'xmpp_login';
    const SCOPE_USER_ONLINE_PRESENCE          = 'user_online_presence';
    const SCOPE_FRIENDS_ONLINE_PRESENCE       = 'friends_online_presence';
    const SCOPE_ADS_MANAGEMENT                = 'ads_management';
    const SCOPE_ADS_READ                      = 'ads_read';
    const SCOPE_CREATE_EVENT                  = 'create_event';
    const SCOPE_CREATE_NOTE                   = 'create_note';
    const SCOPE_EXPORT_STREAM                 = 'export_stream';
    const SCOPE_MANAGE_FRIENDLIST             = 'manage_friendlists';
    const SCOPE_MANAGE_NOTIFICATIONS          = 'manage_notifications';
    const SCOPE_PHOTO_UPLOAD                  = 'photo_upload';
    const SCOPE_PUBLISH_ACTIONS               = 'publish_actions';
    const SCOPE_PUBLISH_CHECKINS              = 'publish_checkins';
    const SCOPE_PUBLISH_STREAM                = 'publish_stream';
    const SCOPE_RSVP_EVENT                    = 'rsvp_event';
    const SCOPE_SHARE_ITEM                    = 'share_item';
    const SCOPE_SMS                           = 'sms';
    const SCOPE_STATUS_UPDATE                 = 'status_update';
    // Extended Profile Properties
    const SCOPE_USER_FRIENDS                  = 'user_friends';
    const SCOPE_USER_ABOUT                    = 'user_about_me';
    const SCOPE_FRIENDS_ABOUT                 = 'friends_about_me';
    const SCOPE_USER_ACTIVITIES               = 'user_activities';
    const SCOPE_FRIENDS_ACTIVITIES            = 'friends_activities';
    const SCOPE_USER_BIRTHDAY                 = 'user_birthday';
    const SCOPE_FRIENDS_BIRTHDAY              = 'friends_birthday';
    const SCOPE_USER_CHECKINS                 = 'user_checkins';
    const SCOPE_FRIENDS_CHECKINS              = 'friends_checkins';
    const SCOPE_USER_EDUCATION                = 'user_education_history';
    const SCOPE_FRIENDS_EDUCATION             = 'friends_education_history';
    const SCOPE_USER_EVENTS                   = 'user_events';
    const SCOPE_FRIENDS_EVENTS                = 'friends_events';
    const SCOPE_USER_GROUPS                   = 'user_groups';
    const SCOPE_FRIENDS_GROUPS                = 'friends_groups';
    const SCOPE_USER_HOMETOWN                 = 'user_hometown';
    const SCOPE_FRIENDS_HOMETOWN              = 'friends_hometown';
    const SCOPE_USER_INTERESTS                = 'user_interests';
    const SCOPE_FRIEND_INTERESTS              = 'friends_interests';
    const SCOPE_USER_LIKES                    = 'user_likes';
    const SCOPE_FRIENDS_LIKES                 = 'friends_likes';
    const SCOPE_USER_LOCATION                 = 'user_location';
    const SCOPE_FRIENDS_LOCATION              = 'friends_location';
    const SCOPE_USER_NOTES                    = 'user_notes';
    const SCOPE_FRIENDS_NOTES                 = 'friends_notes';
    const SCOPE_USER_PHOTOS                   = 'user_photos';
    const SCOPE_USER_PHOTO_VIDEO_TAGS         = 'user_photo_video_tags';
    const SCOPE_FRIENDS_PHOTOS                = 'friends_photos';
    const SCOPE_FRIENDS_PHOTO_VIDEO_TAGS      = 'friends_photo_video_tags';
    const SCOPE_USER_QUESTIONS                = 'user_questions';
    const SCOPE_FRIENDS_QUESTIONS             = 'friends_questions';
    const SCOPE_USER_RELATIONSHIPS            = 'user_relationships';
    const SCOPE_FRIENDS_RELATIONSHIPS         = 'friends_relationships';
    const SCOPE_USER_RELATIONSHIPS_DETAILS    = 'user_relationship_details';
    const SCOPE_FRIENDS_RELATIONSHIPS_DETAILS = 'friends_relationship_details';
    const SCOPE_USER_RELIGION                 = 'user_religion_politics';
    const SCOPE_FRIENDS_RELIGION              = 'friends_religion_politics';
    const SCOPE_USER_STATUS                   = 'user_status';
    const SCOPE_FRIENDS_STATUS                = 'friends_status';
    const SCOPE_USER_SUBSCRIPTIONS            = 'user_subscriptions';
    const SCOPE_FRIENDS_SUBSCRIPTIONS         = 'friends_subscriptions';
    const SCOPE_USER_VIDEOS                   = 'user_videos';
    const SCOPE_FRIENDS_VIDEOS                = 'friends_videos';
    const SCOPE_USER_WEBSITE                  = 'user_website';
    const SCOPE_FRIENDS_WEBSITE               = 'friends_website';
    const SCOPE_USER_WORK                     = 'user_work_history';
    const SCOPE_FRIENDS_WORK                  = 'friends_work_history';
    // Open Graph Permissions
    const SCOPE_USER_MUSIC                    = 'user_actions.music';
    const SCOPE_FRIENDS_MUSIC                 = 'friends_actions.music';
    const SCOPE_USER_NEWS                     = 'user_actions.news';
    const SCOPE_FRIENDS_NEWS                  = 'friends_actions.news';
    const SCOPE_USER_VIDEO                    = 'user_actions.video';
    const SCOPE_FRIENDS_VIDEO                 = 'friends_actions.video';
    const SCOPE_USER_APP                      = 'user_actions:APP_NAMESPACE';
    const SCOPE_FRIENDS_APP                   = 'friends_actions:APP_NAMESPACE';
    const SCOPE_USER_GAMES                    = 'user_games_activity';
    const SCOPE_FRIENDS_GAMES                 = 'friends_games_activity';
    //Page Permissions
    const SCOPE_PAGES                         = 'manage_pages';

    /**
     * {@inheritdoc}
     */
    public function getServiceName()
    {
        return self::SERVICE_NAME;
    }

    /**
     * @return Identity
     */
    public function getIdentity()
    {
        $response = $this->request('/me?fields=id,first_name,last_name,picture,link,email');

        $identity = new Identity($this->getServiceName(), $response['email']);
        $identity->id = $response['id'];
        $identity->first_name = $response['first_name'];
        $identity->last_name = $response['last_name'];
        $identity->picture = $response['picture']['data']['url'];
        $identity->link = $response['link'];

        return $identity;
    }
}