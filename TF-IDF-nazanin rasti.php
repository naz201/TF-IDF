<?php
// آرایه از متن‌ها
$documents = [
    "In the realm of literature, few phenomena have captivated the hearts and imaginations of readers worldwide as profoundly as the Harry Potter series. Penned by the ingenious mind of J.K. Rowling, this seven-book saga has transcended its status as mere fiction to become a cultural phenomenon, enchanting generations with its potent blend of magic, adventure, and profound themes. Through the eyes of the titular character, Harry Potter, readers are transported to the mystical realm of Hogwarts School of Witchcraft and Wizardry, where spells, potions, and mythical creatures abound.At the heart of the Harry Potter series lies an epic tale of good versus evil, friendship, courage, and the power of love. Set in a world where wizards and witches live in secrecy alongside ordinary humans (known as Muggles), the story follows Harry Potter, an orphaned boy who discovers on his eleventh birthday that he is a wizard destined for greatness. As Harry navigates the perils of adolescence, he grapples with the legacy of his parents' untimely demise at the hands of the dark wizard Lord Voldemort, who seeks to conquer the wizarding world and enslave Muggles.Central to the series' allure is Rowling's masterful world-building.",
    " which brings to life a rich tapestry of magical lore and fantastical creatures. From the majestic halls of Hogwarts to the bustling streets of Diagon Alley, every corner of the wizarding world is imbued with intricate detail and whimsical charm. Readers are introduced to a diverse cast of characters, each with their own quirks and complexities, from the loyal Hermione Granger and the loyal Ron Weasley to the enigmatic Severus Snape and the wise Dumbledore..",
    "One of the series' greatest strengths lies in its ability to resonate with readers of all ages, transcending the boundaries of genre and demographic. While ostensibly a children's book series, Harry Potter possesses a timeless appeal that has garnered a devoted following among readers of all ages. Its themes of friendship, loyalty, and the struggle against tyranny resonate on a universal level, making it a story that speaks to the human experience in profound and meaningful ways.
    Moreover, Rowling's narrative is imbued with a sense of wonder and discovery that captures the imagination and fosters a deep emotional connection with readers. Whether it's the thrill of Harry's first broomstick ride or the heart-wrenching loss of beloved characters, each moment is rendered with such vividness and authenticity that it feels as though readers are experiencing them firsthand.
    Beyond its escapist appeal, the Harry Potter series also grapples with weighty moral and ethical dilemmas, challenging readers to confront issues of prejudice, inequality, and the nature of good and evil. Through the lens of the wizarding world, Rowling explores complex issues such as racism (embodied by the pure-blood supremacy ideology of Voldemort and his followers), the importance of tolerance and acceptance (as exemplified by the diverse student body of Hogwarts),
    and the dangers of unchecked ambition and power.In addition to its thematic depth, the Harry Potter series is renowned for its intricate plot twists and intricate storytelling. Rowling weaves a complex web of mystery and intrigue, keeping readers on the edge of their seats with each new revelation and cliffhanger. From the identity of the enigmatic Half-Blood Prince to the truth about Harry s connection to Voldemort, the series is rife with twists and turns that keep readers guessing until the very end. However, perhaps the most enduring legacy of the Harry Potter series lies in its ability to inspire a sense of wonder and magic in the hearts of readers. For millions of fans around the world, Harry Potter is more than just a story—it's a cultural touchstone, a shared language that transcends borders and unites people from all walks of life. From midnight book releases to elaborate fan conventions, the Harry Potter fandom is a vibrant and diverse community that continues to thrive long after the final book was published.In conclusion, the Harry Potter series stands as a testament to the enduring power of storytelling to capture the imagination, ignite the spirit, and inspire positive change in the world. Through its timeless themes, richly imagined world, and unforgettable characters, J.K. Rowling's magnum opus has left an indelible mark on the literary landscape and will continue to enchant readers for generations to come.",
];

// کلمه مورد نظر
$words = ["birthday"];

$numDocuments = count($documents); // تعداد کل مستندات
$documentsWithWord = []; // تعداد مستنداتی که هر کلمه در آن وجود دارد

// شمارش تعداد مستنداتی که هر کلمه در آن وجود دارد
foreach ($words as $word) {
    $count = 0;
    foreach ($documents as $document) {
        if (stripos($document, $word) !== false) {
            $count++;
        }
    }
    $documentsWithWord[$word] = $count;
}

// محاسبه TFIDF برای هر کلمه
foreach ($words as $word) {
    $tfidfScore = calculateTFIDF($word, $documents[0], $numDocuments, $documentsWithWord[$word]);
    echo "TFIDF score for the word '$word' in the text: $tfidfScore\n";
}

function calculateTFIDF($word, $document, $numDocuments, $documentsWithWord) {
    $tf = substr_count(strtolower($document), strtolower($word)) / str_word_count($document);
    $idf = log($numDocuments / ($documentsWithWord + 1));
    return $tf * $idf;
}


?>