<?php

namespace Database\Seeders;

use Botble\ACL\Models\User;
use Botble\Base\Facades\Html;
use Botble\Base\Supports\BaseSeeder;
use Botble\Blog\Models\Category;
use Botble\Blog\Models\Post;
use Botble\Blog\Models\Tag;
use Botble\Slug\Facades\SlugHelper;
use Botble\Slug\Models\Slug;
use Illuminate\Support\Str;

class BlogSeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->uploadFiles('news');

        Post::query()->truncate();
        Category::query()->truncate();
        Tag::query()->truncate();

        $faker = fake();

        $categories = [
            [
                'name' => 'Design',
                'is_default' => true,
            ],
            [
                'name' => 'Lifestyle',
            ],
            [
                'name' => 'Travel Tips',
                'parent_id' => 2,
            ],
            [
                'name' => 'Healthy',
            ],
            [
                'name' => 'Travel Tips',
                'parent_id' => 4,
            ],
            [
                'name' => 'Hotel',
            ],
            [
                'name' => 'Nature',
                'parent_id' => 6,
            ],
        ];

        foreach ($categories as $index => $item) {
            $item['description'] = $faker->text();
            $item['author_id'] = User::query()->value('id');
            $item['author_type'] = User::class;
            $item['is_featured'] = ! isset($item['parent_id']) && $index != 0;

            $category = Category::query()->create($item);

            Slug::query()->create([
                'reference_type' => Category::class,
                'reference_id' => $category->id,
                'key' => Str::slug($category->name),
                'prefix' => SlugHelper::getPrefix(Category::class),
            ]);
        }

        $tags = [
            [
                'name' => 'General',
            ],
            [
                'name' => 'Design',
            ],
            [
                'name' => 'Fashion',
            ],
            [
                'name' => 'Branding',
            ],
            [
                'name' => 'Modern',
            ],
        ];

        foreach ($tags as $item) {
            $item['author_id'] = User::query()->value('id');
            $item['author_type'] = User::class;
            $tag = Tag::query()->create($item);

            Slug::query()->create([
                'reference_type' => Tag::class,
                'reference_id' => $tag->id,
                'key' => Str::slug($tag->name),
                'prefix' => SlugHelper::getPrefix(Tag::class),
            ]);
        }

        $posts = [
            [
                'name' => 'The Top 2020 Handbag Trends to Know',
            ],
            [
                'name' => 'Top Search Engine Optimization Strategies!',
            ],
            [
                'name' => 'Which Company Would You Choose?',
            ],
            [
                'name' => 'Used Car Dealer Sales Tricks Exposed',
            ],
            [
                'name' => '20 Ways To Sell Your Product Faster',
            ],
            [
                'name' => 'The Secrets Of Rich And Famous Writers',
            ],
            [
                'name' => 'Imagine Losing 20 Pounds In 14 Days!',
            ],
            [
                'name' => 'Are You Still Using That Slow, Old Typewriter?',
            ],
            [
                'name' => 'A Skin Cream That’s Proven To Work',
            ],
            [
                'name' => '10 Reasons To Start Your Own, Profitable Website!',
            ],
            [
                'name' => 'Simple Ways To Reduce Your Unwanted Wrinkles!',
            ],
            [
                'name' => 'Apple iMac with Retina 5K display review',
            ],
            [
                'name' => '10,000 Web Site Visitors In One Month:Guaranteed',
            ],
            [
                'name' => 'Unlock The Secrets Of Selling High Ticket Items',
            ],
            [
                'name' => '4 Expert Tips On How To Choose The Right Men’s Wallet',
            ],
            [
                'name' => 'Sexy Clutches: How to Buy & Wear a Designer Clutch Bag',
            ],
        ];

        foreach ($posts as $index => $item) {
            $item['content'] =
                '<p>Fretful human far recklessly while caterpillar well a well blubbered added one a some far whispered rampantly whispered while irksome far clung irrespective wailed more rosily and where saluted while black dear so yikes as considering recast to some crass until.</p>' .
                ($index % 3 == 0 ? Html::tag(
                    'p',
                    '[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]'
                ) : '') .
                '   <hr class="wp-block-separator is-style-dots">
                    <p>Thanks sniffed in hello after in foolhardy and some far purposefully much one at the much conjointly leapt skimpily that quail sheep some goodness <a href="#">nightingale</a> the instead exited expedient up far ouch mellifluous altruistic and and lighted more instead much when ferret but the.</p>
                    <figure class="wp-block-gallery columns-3 wp-block-image">
                        <ul class="blocks-gallery-grid">
                            <li class="blocks-gallery-item"><a href="#"><img class="border-radius-5" src="https://demos.alithemes.com/html/stories/demo/assets/imgs/news/thumb-2.jpg" alt=""></a></li>
                            <li class="blocks-gallery-item"><a href="#"><img class="border-radius-5" src="https://demos.alithemes.com/html/stories/demo/assets/imgs/news/thumb-3.jpg" alt=""></a></li>
                            <li class="blocks-gallery-item"><a href="#"><img class="border-radius-5" src="https://demos.alithemes.com/html/stories/demo/assets/imgs/news/thumb-4.jpg" alt=""></a></li>
                        </ul>
                        <figcaption> <i class="ti-credit-card mr-5"></i>Image credit: Behance </figcaption>
                    </figure>
                    <hr>
                    <p>Yet more some certainly yet alas abandonedly whispered <a href="#">intriguingly</a><sup><a href="#">[2]</a></sup> well extensive one howled talkative admonishingly below a rethought overlaid dear gosh activated less <a href="#">however</a> hawk yet oh scratched ostrich some outside crud irrespective lightheartedly and much far amenably that the elephant since when.</p>
                    <h2>The Guitar Legends</h2>
                    <p>Furrowed this in the upset <a href="#">some across</a><sup><a href="#">[3]</a></sup> tiger oh loaded house gosh whispered <a href="#">faltering alas</a><sup><a href="#">[4]</a></sup> ouch cuckoo coward in scratched undid together bit fumblingly so besides salamander heron during the jeepers hello fitting jauntily much smoothly globefish darn blessedly far so along bluebird leopard and.</p>
                    <blockquote>
                        <p>Integer eu faucibus <a href="#">dolor</a><sup><a href="#">[5]</a></sup>. Ut venenatis tincidunt diam elementum imperdiet. Etiam accumsan semper nisl eu congue. Sed aliquam magna erat, ac eleifend lacus rhoncus in.</p>
                    </blockquote>
                    <p>Fretful human far recklessly while caterpillar well a well blubbered added one a some far whispered rampantly whispered while irksome far clung irrespective wailed more rosily and where saluted while black dear so yikes as considering recast to some crass until cow much less and rakishly overdrew consistent for by responsible oh one hypocritical less bastard hey oversaw zebra browbeat a well.</p>
                    <h3>Getting Crypto Rich</h3>
                    <hr class="wp-block-separator is-style-wide">
                    <div class="wp-block-image">
                        <figure class="alignleft is-resized">
                            <img class="border-radius-5" src="https://demos.alithemes.com/html/stories/demo/assets/imgs/news/thumb-11.jpg">
                        </figure>
                    </div>
                    <p>And far contrary smoked some contrary among stealthy engagingly suspiciously a cockatoo far circa sank dully lewd slick cracked llama the much gecko yikes more squirrel sniffed this and the the much within uninhibited this abominable a blubbered overdid foresaw through alas the pessimistic.</p>
                    <p>Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard roadrunner flapped lynx far that and jeepers giggled far and far bald that roadrunner python inside held shrewdly the manatee.</p>
                    <br>
                    <hr>
                    <p>Thanks sniffed in hello after in foolhardy and some far purposefully much one at the much conjointly leapt skimpily that quail sheep some goodness nightingale the instead exited expedient up far ouch mellifluous altruistic and and lighted more instead much when ferret but the.</p>
                    <p>Yet more some certainly yet alas abandonedly whispered intriguingly well extensive one howled talkative admonishingly below a rethought overlaid dear gosh activated less however hawk yet oh scratched ostrich some outside crud irrespective lightheartedly and much far amenably that the elephant since when.</p>
                ';
            $item['author_id'] = User::query()->value('id');
            $item['author_type'] = User::class;
            $item['views'] = $faker->numberBetween(100, 2500);
            $item['is_featured'] = $index < 6;
            $item['image'] = 'news/' . ($index + 1) . '.jpg';
            $item['description'] = $faker->text();

            $post = Post::query()->create($item);

            $post->categories()->sync([
                $faker->numberBetween(1, 4),
                $faker->numberBetween(5, 7),
            ]);

            $post->tags()->sync([1, 2, 3, 4, 5]);

            Slug::query()->create([
                'reference_type' => Post::class,
                'reference_id' => $post->id,
                'key' => Str::slug($post->name),
                'prefix' => SlugHelper::getPrefix(Post::class),
            ]);
        }
    }
}
