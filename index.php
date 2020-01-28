<?php
/**
 * MoeGallery 相册主题
 *
 * @package Moe Gallery
 * @author Red Neno
 * @version 1.0.0
 * @link https://redneno.me
 */
$this->need('header.php');
?>

    <div>
        <div class="mdui-appbar mdui-appbar-fixed mg-appbar">
            <div class="mdui-toolbar mdui-color-theme">
                <a href="/" class="mdui-typo-title">
                    <?php $this->options->title(); ?><?php $this->archiveTitle(); ?>
                </a>
                <div class="mdui-toolbar-spacer"></div>
                <button onclick="foldAll()" mdui-tooltip="{content: '折叠全部图集'}" class="mdui-btn mdui-btn-icon">
                    <i class="mdui-icon material-icons">unfold_less</i>
                </button>
                <button onclick="fullscreen()" mdui-tooltip="{content: '切换全屏浏览'}"
                        class="mdui-btn mdui-btn-icon mdui-hidden-xs-down">
                    <i class="mdui-icon material-icons" id="icon_fullscreen">fullscreen</i>
                </button>
                <button class="mdui-btn mdui-btn-icon" mdui-menu="{target: '#main-menu'}">
                    <i class="mdui-icon material-icons">more_vert</i>
                </button>
                <ul class="mdui-menu" id="main-menu">
                    <li class="mdui-menu-item">
                        <a href="/admin" class="mdui-ripple">
                            <i class="mdui-menu-item-icon mdui-icon material-icons">lock_outline</i>管理
                        </a>
                    </li>
                    <!--                    <li class="mdui-divider"></li>-->
                    <!--                    <li class="mdui-menu-item">-->
                    <!--                        <a onclick="msgBox('关于 Moe Gallery', '由 RED NENO 开发的图床应用')" class="mdui-ripple">-->
                    <!--                            <i class="mdui-menu-item-icon mdui-icon material-icons">info_outline</i>关于-->
                    <!--                        </a>-->
                    <!--                    </li>-->
                </ul>
            </div>
        </div>

        <div class="mg-content">

            <div class="mdui-container">

                <div class="mdui-fab-wrapper" id="fab" mdui-fab="{trigger: 'click'}">
                    <button onclick="scrollScreenTo(0)" class="mdui-fab mdui-ripple mdui-color-grey-900">
                        <i class="mdui-icon material-icons">keyboard_arrow_up</i>
                    </button>
                </div>

                <!--                <div class="mg-loading" v-if="$store.state.galleries === null">-->
                <!--                    <div class="mdui-card mg-rotate-circle">-->
                <!--                        <div class="mdui-spinner"></div>-->
                <!--                    </div>-->
                <!--                    <p>少女祈祷中...</p>-->
                <!--                </div>-->

                <?php
                while ($this->next()):
                    $images = formatImages($this->fields->images);
                    ?>
                    <div class="mdui-panel mdui-panel-gapless" mdui-panel>
                        <div class="mdui-panel-item mdui-panel-item-open">
                            <div class="mdui-panel-item-header">
                                <div class="mdui-panel-item-title">
                                    <?php $this->title() ?>
                                    <span> / <b><?php echo count($images) ?>图</b></span>
                                </div>
                                <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
                            </div>
                            <div class="mdui-panel-item-body">
                                <div class="mdui-typo">
                                    <blockquote>
                                        <p><?php $this->content('...'); ?></p>
                                        <p>
                                            <kbd><?php $this->date('Y / m / d'); ?></kbd>
                                            <script>
                                                tag_element = `<?php $this->tags('|', true, null); ?>`;
                                                tags = tag_element.split('|');
                                                for (let i in tags) {
                                                    if (tags[i])
                                                        document.write(`<kbd>${tags[i]}</kbd>`);
                                                }
                                                tag_element = tags = null;
                                            </script>
                                        </p>
                                    </blockquote>
                                </div>
                                <div class="imageGroup">
                                    <?php
                                    if ($images) {
                                        for ($i = 0; $i < count($images); $i++) {
                                            ?>
                                            <div class="mg-image-container mdui-col-xs-12 mdui-col-sm-6 mdui-col-md-3">
                                                <img src="<?php echo $images[$i] ?>"
                                                     class="mg-image" alt="">
                                            </div>
                                        <?php }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

                <!--                <mg-panel v-for="(gallery, k1) in galleries" :key="k1" :title="gallery.title" :count="gallery.images.length">-->
                <!--                    <div class="mdui-typo">-->
                <!--                        <blockquote>-->
                <!--                            <p>-->
                <!--                                {{ gallery.description }}-->
                <!--                            </p>-->
                <!--                            <p>-->
                <!--                                <kbd>{{ formatDate(new Date(gallery.time), 'yyyy / MM / dd') }}</kbd><kbd-->
                <!--                                        v-for="(tag, k2) in gallery.tags"-->
                <!--                                        :key="k2">{{ tag }}</kbd>-->
                <!--                            </p>-->
                <!--                        </blockquote>-->
                <!--                    </div>-->
                <!--                    <div>-->
                <!--                        <mg-image v-for="(src, index) in gallery.images" :key="index" :src="src"-->
                <!--                                  alt=""></mg-image>-->
                <!--                    </div>-->
                <!--                </mg-panel>-->
            </div>

        </div>

    </div>

<?php
$this->need('footer.php');
?>