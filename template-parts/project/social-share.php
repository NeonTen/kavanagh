<?php
/**
 * The template part for displaying social share icons.
 *
 * @package Netbiz
 */

?>

<div class="flex space-x-6">
    <a href="//www.facebook.com/share.php?m2w&s=100&p[url]=<?php echo rawurlencode( get_permalink() ); ?>&p[images][0]=<?php echo rawurlencode( $img_url ); ?>&p[title]=<?php echo rawurlencode( get_the_title() ); ?>&u=<?php echo rawurlencode( get_permalink() ); ?>&t=<?php echo rawurlencode( get_the_title() ); ?>" class="text-xl hover:text-theme-color" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M25.5524 34V24.8919H28.6252L29.0819 21.3258H25.5524V19.0543C25.5524 18.0253 25.8392 17.3207 27.3161 17.3207H29.1875V14.1413C28.2769 14.0437 27.3617 13.9966 26.4459 14.0002C23.7299 14.0002 21.8652 15.6582 21.8652 18.702V21.3191H18.8125V24.8852H21.8719V34H25.5524Z" fill="#0E2F58"/>
    <rect x="0.5" y="0.5" width="47" height="47" rx="23.5" stroke="#0E2F58"/>
    </svg>
    </a>
    
    <!-- <a href="http://pinterest.com/pin/create/button/?url=<?php //echo rawurlencode( get_permalink( $post->ID ) ); ?>&media=<?php //echo rawurlencode( $img_url ); ?>&description=<?php //get_the_title(); ?>" class="text-xl hover:text-theme-color" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">pinterest</a> -->
    
    <a title="Click to share this post on Twitter" href="http://twitter.com/intent/tweet?text=<?php echo rawurlencode( get_the_title() ); ?>&url=<?php echo rawurlencode( get_permalink() ); ?>" class="text-xl hover:text-theme-color" target="_blank" rel="noopener noreferrer">
    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M36 16.3724C35.1174 16.7733 34.1693 17.0441 33.1726 17.1666C34.201 16.5358 34.9704 15.5429 35.3373 14.3733C34.371 14.9616 33.3135 15.3757 32.2107 15.5977C31.4691 14.786 30.4868 14.248 29.4164 14.0672C28.3459 13.8864 27.2472 14.0729 26.2907 14.5978C25.3343 15.1228 24.5737 15.9567 24.127 16.9701C23.6803 17.9836 23.5725 19.1199 23.8203 20.2026C21.8624 20.1018 19.9471 19.5802 18.1986 18.6715C16.4502 17.7628 14.9076 16.4874 13.6711 14.928C13.2483 15.6757 13.0052 16.5425 13.0052 17.4656C13.0047 18.2967 13.2044 19.115 13.5864 19.848C13.9685 20.581 14.5211 21.2059 15.1953 21.6675C14.4134 21.642 13.6488 21.4254 12.965 21.0358V21.1008C12.965 22.2664 13.3583 23.3961 14.0782 24.2982C14.7982 25.2004 15.8005 25.8194 16.915 26.0503C16.1897 26.2515 15.4292 26.2811 14.6911 26.137C15.0055 27.1399 15.6181 28.0169 16.4429 28.6452C17.2678 29.2735 18.2636 29.6217 19.2911 29.641C17.5469 31.0446 15.3928 31.806 13.1754 31.8026C12.7826 31.8027 12.3901 31.7792 12 31.7322C14.2508 33.2157 16.871 34.003 19.5469 34C28.6053 34 33.5573 26.3092 33.5573 19.6391C33.5573 19.4224 33.552 19.2036 33.5425 18.9869C34.5057 18.2728 35.3372 17.3886 35.9979 16.3756L36 16.3724Z" fill="#0E2F58"/>
        <rect x="0.5" y="0.5" width="47" height="47" rx="23.5" stroke="#0E2F58"/>
    </svg>
    </a>
    
    <!-- <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php //echo rawurlencode( get_permalink() ); ?>&title=<?php //echo rawurlencode( get_the_title() ); ?>&source=<?php //echo 'url'; ?>" target="_blank" class="text-xl hover:text-theme-color" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">linkedin</a> -->
</div>
