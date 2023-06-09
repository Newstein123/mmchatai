<?php

namespace Database\Seeders;

use App\Models\Chat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $questions = [
            'Find friends near you.',
            'Connect with new people.',
            'Join groups of your interest.',
            'Discover exciting events.',
            'Share your photos.',
            'Watch trending videos.',
            'Explore popular hashtags.',
            'Follow your favorite accounts.',
            'See who is following you.',
            'Check your likes and comments.',
            'Read and reply to messages.',
            'Stay updated with notifications.',
            'Customize your settings.',
            'Manage your profile information.',
            'Explore and discover new content.',
            'Search for interesting topics.',
            'Connect and network with others.',
            'Share posts with your followers.',
            'Tag friends in your photos.',
            'Follow and unfollow accounts.',
            'Leave comments on posts.',
            'Like and react to content.',
            'Manage your inbox messages.',
            'Check your mentions and tags.',
            'Stay updated on trending topics.',
            'Discover popular and live content.',
            'Apply filters to your photos.',
            'Control your privacy settings.',
            'Block and report abusive content.',
            'Get personalized recommendations.',
            'Find suggestions for people to follow.',
            'Manage your search settings.',
            'Scroll through your feed.',
            'Share your status updates.',
            'Get the latest news.',
            'Browse your feed content.',
            'Discover new content and accounts.',
            'Join or leave communities.',
            'Create and edit posts.',
            'Delete unwanted content.',
            'Save interesting posts.',
            'Adjust your account settings.',
            'Receive important notifications.',
            'Manage your contacts list.',
            'Accept or decline requests.',
            'View and manage your connections.',
            'Invite others to join.',
            'Grow your network.',
            'Connect with people.',
            'Send and accept invitations.',
            'Manage your pending requests.',
            'Search for contacts.',
            'Discover new connections.',
            'Send messages and chats.',
            'Engage in conversations.',
            'Start a new message.',
            'Compose and send messages.',
            'Archive or delete conversations.',
            'Organize your inbox.',
            'Stay updated with notifications.',
            'Receive alerts and updates.',
            'Read news and updates.',
            'Scroll through your activity feed.',
            'Like and interact with content.',
            'Comment on posts.',
            'Share interesting content.',
            'React to posts and updates.',
            'Follow accounts of your interest.',
            'Search for specific settings.',
            'Manage your privacy options.',
            'Enhance your account security.',
            'Set up two-factor authentication.',
            'Log in to your account.',
            'Log out from your session.',
            'Sign up for a new account.',
            'Deactivate your account.',
            'Delete your account permanently.',
            'Adjust your account preferences.',
            'Select your preferred language.',
            'Customize your theme settings.',
            'Enable dark mode.',
            'Switch to light mode.',
            'Manage your notification settings.',
            'Control email notifications.',
            'Configure push notifications.',
            'Set up SMS notifications.',
            'Manage sound and vibration alerts.',
            'Choose the frequency of alerts.',
            'Import and export your contacts.',
            'Sync contacts from other platforms.',
            'Integrate with third-party apps.',
            'Connect through the API.',
            'Analyze your data and metrics.',
            'Gain insights into your usage.',
            'Generate reports and analytics.',
            'Read the terms and conditions.',
            'Understand privacy policies.',
            'Follow community guidelines.',
            'Get help and support.',
            'Read frequently asked questions.',
            'Contact the support team.',
            'Provide feedback or suggestions.',
            'Report bugs or issues.',
            'Request new features.',
            'Upgrade to a premium account.',
            'Compare free and premium plans.',
            'Manage your subscription.',
            'Handle billing and payments.',
            'Cancel or request a refund.',
            'Choose the right pricing plan.',
            'Explore features and benefits.',
            'Read testimonials and reviews.',
            'Analyze statistics and metrics.',
            'Read a case study.',
            'Celebrate success stories.',
            'Read articles and blog posts.',
            'Stay updated with news and updates.',
            'Learn from tutorials and resources.',
            'Get tips and tricks.',
            'Discover best practices.',
            'Find inspiration in the community.',
            'Engage in forum discussions.',
            'Attend events and meetups.',
            'Join conferences and webinars.',
            'Listen to podcasts.',
            'Explore recommended books.',
            'Enroll in online courses.',
            'Earn certification in a field.',
            'Explore partnership opportunities.',
            'Become an affiliate partner.',
            'Search for a career or job.',
            'Find an internship opportunity.',
            'Discover job vacancies.',
            'Apply for a position.',
            'Submit your resume or CV.',
            'Seize a new career opportunity.',
            'Network with professionals.',
            'Find a mentor or mentee.',
            'Improve your skills and knowledge.',
            'Embark on a learning journey.',
            'Pursue education and insights.',
            'Seek motivation and inspiration.',
            'Take up a new challenge.',
            'Set and achieve goals.',
            'Foster creativity and innovation.',
            'Follow your passion.',
            'Adopt a fulfilling lifestyle.',
        ];
        
        foreach($questions as $question) {
            Chat::create([
                'human' => $question,
                'ai' => 'this is ai response' ,
            ]);
        }
    }
}
