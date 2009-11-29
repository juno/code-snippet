-export([spam/0]).

main() ->
    {ok, Value1} = ?MODULE:spam(),
    {ok, Value2} = eggs().

spam() ->
    {ok, 10}.

eggs() ->
    {ok, 100}.
