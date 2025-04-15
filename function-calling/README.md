Small PHP-based playground to experiment with function calling models.

Examples build on the assumption that you'll run [llama.cpp](https://github.com/ggml-org/llama.cpp) locally, but any
other LLM runner with OpenAI compatible API will do.


Good starting models are [BitAgent-8B-GGUF](https://huggingface.co/mradermacher/BitAgent-8B-GGUF) and
[functionary-small-v3.2-GGUF](https://huggingface.co/mradermacher/functionary-small-v3.2-GGUF). I've used the Q4\_K\_M variants
for both.


Start a server instance:

```
llama-server --jinja --temp 1.0 -m functionary-small-v3.2-q4_k_m.gguf
```

And run with some example prompts

```
$ composer install

$ ./run_example "can you tell me anything about cats?"
Calling get_random_cat_fact with {}
Result Fact: In one stride, a cheetah can cover 23 to 26 feet (7 to 8 meters).
Passing back data into model
Sure! Here's a fun fact about cats: In one stride, a cheetah can cover 23 to 26 feet (7 to 8 meters). How fast is that?

$ ./run_example "my name is John Doe, can you tell me anything about me?"
Calling predict_age_by_name with {"name":"John Doe"}
Result Predicted age: 74
Passing back data into model
Based on the name you've provided, John Doe, I've predicted that you are 74 years old.
```

> [!NOTE]
> There are two different functions within the project that call free to use external APIs. The one about cat facts,
> and the function that guesses age based on name.
