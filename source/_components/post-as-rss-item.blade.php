<entry>
    <id>{{ $entry->getUrl() }}</id>
    <link type="text/html" rel="alternate" href="{{ $entry->getUrl() }}" />
    <title>{{ $entry->title }}</title>
    <published>{{ $entry->getDate()->format(DATE_ATOM) }}</published>
    <updated>{{ $entry->getDate()->format(DATE_ATOM) }}</updated>
    <author>
        <name>{{ $entry->author }}</name>
    </author>
    <summary type="html">{{ $entry->getExcerpt() }}...</summary>
    <content type="html"><![CDATA[
        @include('_posts.' . $entry->getFilename())
    ]]></content>
</entry>
